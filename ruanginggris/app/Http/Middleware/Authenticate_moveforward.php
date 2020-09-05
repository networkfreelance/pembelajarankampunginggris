<?php

namespace App\Http\Middleware;

use App\LastSession;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;
use  DB;

class Authenticate_moveforward
{
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth_moveforward;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth_moveforward)
	{
		$this->auth_moveforward = $auth_moveforward;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$userData = Session::get('user_app');
		// dd($userData);
		if (isset($userData)) {
			// If current session id is not same with last_session column
			$last_session = LastSession::where('user_id', '=', $userData['userid'])->select('session')->first();
			// print_r(Session::getId().'  ');print_r($last_session->session);exit;
			// if (is_null($last_session)) {
			if (!is_null($last_session) && $last_session->session != $userData['session']) {
				// do logout
				session_start();
				// remove session id
				$user_data = session::get('user_app');
				// dd($user_data);
				$pengguna  = DB::table('last_session')->where('user_id',$user_data['userid'])->update(array('session' => ''));
				// $pengguna  = LastSession::find($user_data['userid'])->update(array('session' => ''));
				Session::flush();

				if (isset($_SERVER['HTTP_COOKIE'])) {
					$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
					foreach ($cookies as $cookie) {
						$parts = explode('=', $cookie);
						$name  = trim($parts[0]);
						setcookie($name, '', time() - 1000);
						setcookie($name, '', time() - 1000, '/');
					}
				}

				// Unset all of the session variables.
				$_SESSION = array();

				// If it's desired to kill the session, also delete the session cookie.
				// Note: This will destroy the session, and not just the session data!
				if (ini_get("session.use_cookies")) {
					$params = session_get_cookie_params();
					setcookie(session_name(), '', time() - 42000,
						$params["path"], $params["domain"],
						$params["secure"], $params["httponly"]
					);
				}

				// Finally, destroy the session.
				session_destroy();

				// Redirect to login page
				return Redirect('login')->withErrors('Akun telah digunakan')->withInput();
			}

			return $next($request);
		} else {
			return Redirect('login');
		}
	}
}