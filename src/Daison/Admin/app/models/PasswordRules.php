<?php namespace Daison\Admin\App\Models;

class PasswordRules
{
  private $password = NULL;

  private $min_length = 12;
  private $min_length_err_message = NULL;

  private $req_one_num = false;
  private $req_one_num_err_message = NULL;

  private $req_special_char = false;
  private $req_special_char_err_message = null;

  private $req_upper_n_lower = false;
  private $req_upper_n_lower_err_message = false;


  /**
   *
   *
   * @param unknown $password (optional)
   */
  public function __construct($password = NULL)
  {
    $this->password = $password;
  }

  /**
   *
   *
   * @param unknown $length
   * @param unknown $err_message (optional)
   * @return unknown
   */
  public function setMinimumLength($length, $err_message = NULL)
  {
    $this->min_length = $length;
    $this->min_length_err_message = $err_message;

    return $this;
  }

  /**
   *
   *
   * @param unknown $bool
   * @param unknown $err_message (optional)
   * @return unknown
   */
  public function setRequireAtleastOneNumber($bool, $err_message = NULL)
  {
    $this->req_one_num = $bool;
    $this->req_one_num_err_message = $err_message;

    return $this;
  }

  /**
   *
   *
   * @param unknown $bool
   * @param unknown $err_message (optional)
   * @return unknown
   */
  public function setRequireAtleastOneSpecialCharacter($bool, $err_message = NULL)
  {
    $this->req_special_char = $bool;
    $this->req_special_char_err_message = $err_message;

    return $this;
  }

  /**
   *
   *
   * @param unknown $bool
   * @param unknown $err_message (optional)
   * @return unknown
   */
  public function setRequireUpperAndLower($bool, $err_message = NULL)
  {
    $this->req_upper_n_lower = $bool;
    $this->req_upper_n_lower_err_message = $err_message;

    return $this;
  }

  /**
   *
   *
   * @param unknown $password
   * @return unknown
   */
  public function setInputtedPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   *
   *
   * @return unknown
   */
  public function check()
  {

    /**
     * Check if password is set.
     */
    if ( strlen($this->password) == 0 ) {
      throw new \Exception('Password is empty or not defined.');
    }


    /**
     * Check if the password contain a space
     */
    if ( count(explode(' ', $this->password)) > 1 ) {
      throw new \Exception('Password must not contain a space.');
    }


    /**
     * If the password is lesser than the minimum length, throw error
     */
    if ( strlen($this->password) < $this->min_length ) {
      if (is_null($this->min_length_err_message) == false) {
        throw new \Exception($this->min_length_err_message);
      }

      throw new \Exception('Password must contain at least ' . $this->min_length . ' alphanumeric characters.');
    }


    /**
     * Check if the password contain atleast one number
     */
    if ( $this->req_one_num == true ) {
      if (preg_match( '~\d~', $this->password) == false) {
        if (is_null($this->req_one_num_err_message) == false) {
          throw new \Exception($this->req_one_num_err_message);
        }

        throw new \Exception('Password must contain at least one number.');
      }
    }


    /**
     * Check if the password contain special character
     */
    if ( $this->req_special_char == true ) {
      if (preg_match('/[^a-zA-Z\d]/', $this->password) == false) {
        if (is_null($this->req_special_char_err_message) == false) {
          throw new \Exception($this->req_special_char_err_message);
        }

        throw new \Exception('Password must contain at least one special character');
      }
    }


    /**
     * Check if password has upper and lower case letters
     */
    if ( $this->req_upper_n_lower == true ) {
      $lower = strtolower($this->password) === $this->password;
      $upper = strtoupper($this->password) === $this->password;
      if ($lower || $upper) {
        if (is_null($this->req_upper_n_lower_err_message) == false) {
          throw new \Exception($this->req_upper_n_lower_err_message);
        }

        throw new \Exception('Password must contain both upper and lower case letters');
      }
    }

    return true;
  }

}
