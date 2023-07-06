// end of modified by kelvin
			//if the brandmoran returns an error that isn't a timeout error kill the whole sript
			if (is_wp_error($request)&&!preg_match("/cURL error 28/i",$request->get_error_message())){
			    //execute to kill the whole script 
				wp_die($request->get_error_message());
			}
			//else if the brandmoran returns a timeout error attempt with no proxy
			if(is_wp_error($request)&&preg_match("/cURL error 28/i",$request->get_error_message())){
				$request = wp_remote_get($_GET['address'], $args);
				if(is_wp_error($request)){
					wp_die($request->get_error_message());
				}
			}
