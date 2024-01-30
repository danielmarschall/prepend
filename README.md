# PHP prepend scripts for compatibility

This package contains php functions for backwards compatibility, which can be included as "prepend" script - this means, that all PHP scripts (called via Apache, CLI etc.) include these scripts and therefore offer the backwards compatibility functions.

Currently, the pack contains following units:
- Replacement of mysql-functions with PHP 7
- Replacement of register_globals
- Replacement for ereg-functions and split-functions
- Small (weak) XSS WAF

If you need `htmlentities()`, `htmlspecialchars()` or `html_entity_decode()` with old semantics, you can download compatibility functions [url=https://misc.daniel-marschall.de/code/php/php_utils/htmlentities_compat.inc.php]here[/url]
