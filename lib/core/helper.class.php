<?php
class helper
{
    public static function segment($part)
    {
        $url = str_replace(path, "", $_SERVER['REQUEST_URI']);
        $result = explode("/", $url);
        if (!empty($result[$part])) {
            return $result[$part];
        } else {
            return 0;
        }
    }
    public function full_url(){
        return $_SERVER['REQUEST_URI'];
    }
    public function redirect($url){
        header("Location: ".$url);
    }
    public function baseurl()
    {
        return domain.path;
    }
    public function reverseIPOctets($ip)
    {
        return implode('.', array_reverse(explode('.', $ip)));
    }
    public function checkTor(){
        if (gethostbyname($this->ReverseIPOctets($_SERVER['REMOTE_ADDR']).".".$_SERVER['SERVER_PORT'].".".$this->ReverseIPOctets($_SERVER['SERVER_ADDR']).".ip-port.exitlist.torproject.org")=="127.0.0.2") {
            return "tor";
        }
    }
    public function browser_info()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $ub = 'Unknown';
        if(preg_match('/MSIE/i',$u_agent))
        {
            $ub = "MSIE";
        }
        elseif(preg_match('/Edge/i',$u_agent))
        {
            $ub = "Edge";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $ub = "Opera";
        }
        elseif(preg_match('/Firefox/i',$u_agent) && $this->checkTor() != "tor")
        {
            $ub = "Firefox";
        }
        elseif(preg_match('/http/i',$u_agent) || preg_match('/https/i',$u_agent))
        {
            $ub = "Iframe";
        }
        elseif(preg_match('/OPR/i',$u_agent))
        {
            $ub = "Opera";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $ub = "Safari";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $ub = "Netscape";
        }elseif ($this->checkTor() == "tor"){
            $ub = "Tor";
        }
        return $ub;
    }
    public function os_info() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os_platform = "Unknown OS Platform";
        $os_array = array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );
        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }
        }
        return $os_platform;
    }
}