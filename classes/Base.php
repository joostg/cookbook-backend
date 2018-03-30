<?php
abstract class Base {
	protected $ci;

	public function __construct(Slim\Container $ci) {
		$this->ci = $ci;
		$this->db = $this->ci->get('db');
		$this->view = $this->ci->get('view');
		$this->slugify = $this->ci->get('slugify');
	}

    protected function random_string($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        if ($max < 1) {
            throw new Exception('$keyspace must be at least two characters long');
        }
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[crypto_rand_secure(0, $max)];
        }
        return $str;
    }

    /**
     * safe substitution for rand()
     * @param $min
     * @param $max
     * @return mixed
     */
    protected function crypto_rand_secure($min, $max) {
        $range = $max - $min;
        if ($range == 0) {
            return $min; // not so random...
        }
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes, $s)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }
}
