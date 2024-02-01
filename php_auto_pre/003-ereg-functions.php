<?php

$xxx_vts_prepend_config = array();
if (file_exists($xxx_vts_prepend_config_file = __DIR__.'/../config.local.php')) include $xxx_vts_prepend_config_file;
unset($xxx_vts_prepend_config_file);
$xxx_directories_need_ereg = $xxx_vts_prepend_config['directories_need_ereg'] ?? array(); /* @phpstan-ignore-line */
unset($xxx_vts_prepend_config);

$xxx_go = false;
foreach ($xxx_directories_need_ereg as $xxx_directory_need_ereg) { /* @phpstan-ignore-line */
	if ($xxx_negate = (substr($xxx_directory_need_ereg,0,1) === '!')) {
		$xxx_directory_need_ereg = substr($xxx_directory_need_ereg,1);
	}
	if (strpos($_SERVER['SCRIPT_FILENAME'], $xxx_directory_need_ereg) === 0) {
		$xxx_go = !$xxx_negate;
	}
	unset($xxx_negate);
}
unset($xxx_directories_need_ereg);
unset($xxx_directory_need_ereg);

if ($xxx_go) { /* @phpstan-ignore-line */
	if (function_exists('ereg') !== true) {
		function ereg($pattern, $string, &$regs) {
			return preg_match('~' . addcslashes($pattern, '~') . '~', $string, $regs);
		}
	}

	if (function_exists('eregi') !== true) {
		function eregi($pattern, $string, &$regs) {
			return preg_match('~' . addcslashes($pattern, '~') . '~i', $string, $regs);
		}
	}

	if (function_exists('ereg_replace') !== true) {
		function ereg_replace($pattern, $string, $replace) {
			return preg_replace('~' . addcslashes($pattern, '~') . '~', $string, $replace);
		}
	}

	if (function_exists('eregi_replace') !== true) {
		function eregi_replace($pattern, $string, $replace) {
			return preg_replace('~' . addcslashes($pattern, '~') . '~i', $string, $replace);
		}
	}

	if (function_exists('split') !== true) {
		function split($pattern, $string, $limit=-1) {
			return preg_split('~' . addcslashes($pattern, '~') . '~', $string, $limit);
		}
	}

	if (function_exists('spliti') !== true) {
		function spliti($pattern, $string, $limit=-1) {
			return preg_split('~' . addcslashes($pattern, '~') . '~i', $string, $limit);
		}
	}

	if (function_exists('sql_regcase') !== true) {
		function sql_regcase($string) {
			$out = '';
			for ($i=0; $i<strlen($string); $i++) {
				$char = $string[$i];
				$up = strtoupper($char);
				$low = strtolower($char);
				if ($up != $low) {
					$out .= "[$up$low]";
				} else {
					$out .= $char;
				}
			}
			return $out;
		}
	}
}
unset($xxx_go);
