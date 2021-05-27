<?php 
$search = '/[a-zA-Z]\s(\()[a-zA-Z0-9_]+(.)[a-zA-Z]+(\)).,$';
$search = "/([a-zA-Z])\s(\()";
$replace = "/([a-zA-Z])(')\s(=>)\s(')";


$space_left_parentheses = "\s(\()";
$replace_with = " ' => ' ";


// Positive Lookahead 
// Matches a group after the main expression without including it in the result.
$positive_lookahead = "\s\((?=[a-z0-9].*)";
$positive_lookahead = "\s\((?=[a-z0-9].*\')";
$replace_with = "' => '";


//* $space_left_parentheses_lowercase_anycharachters_until_single_quotation = "(?>\s\([a-z].*\')"; *//
//* https://stackoverflow.com/questions/17064426/php-regex-match-in-file-content#17064592 *//
//* $file_is = './least-biased.php'; *//
//* preg_match_all *//

//* $single_quote_three_capital_letters_right_parentheses_single_quote_space_right_arrow_space = "[A-Z]{3}(\)')\s(=>)\s'"; *//
//* $replace_with = ""; *//