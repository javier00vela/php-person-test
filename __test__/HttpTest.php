<?php

require_once  "vendor/phpunit/phpunit/src/Framework/TestCase.php";
require_once  "config/Const.php";

use helpers\customer\CustomerData;
use PHPUnit\Framework\TestCase;

final class HttpTest extends TestCase
{

    /** Expect 200 status from web  */
    public function testLoginStatusHttp()
    {
        $headers = get_headers(DIR_URL . "/user/login");
        $this->assertEquals(substr($headers[0], 9, 3), 200);
    }

    /** Expect 200 status from web */
    public function testRegisterStatusHttp()
    {
        $headers = get_headers(DIR_URL . "/user/register");
        $this->assertEquals(substr($headers[0], 9, 3), 200);
    }
}
