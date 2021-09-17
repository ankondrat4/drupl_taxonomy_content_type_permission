<?php
interface iUser
{
    public function GetLastName();
    public function GetFirstName();
    public function GetBirth();
    public function GetEmail();
    public function GetPassword();
    public function GetLogin();
    public function SetLastName(string $temp);
    public function SetFirstName(string $temp);
    public function SetBirth(string $temp);
    public function SetEmail(string $temp);
    public function SetPassword(string $temp);
    public function SetLogin(string $temp);
}

class User implements iUser
{
    private string $login;
    private string $firstname;
    private string $lastname;
    private string $birth;
    private string $email;
    private string $password;
    private string $id;

   /* public function __construct(string $l, string $f, string $ln, string $b, string $m, string $p, string $id) {
        $this->login=$l;
        $this->firstname=$f;
        $this->lastname=$ln;
        $this->birth=$b;
        $this->email=$m;
        $this->password=$p;
        $this->id=$id;
    }*/

    public function GetLastName(){
        return $this->lastname;
    }

    public function GetFirstName(){
        return $this->firstname;
    }

    public function GetBirth(){
        return $this->birth;
    }

    public function GetEmail(){
        return $this->email;
    }

    public function GetPassword(){
        return $this->password;
    }

    public function GetLogin(){
        return $this->login;
    }

    public function SetLastName(string $temp){
        $this->lastname=$temp;
    }

    public function SetFirstName(string $temp){
        $this->firstname=$temp;
    }

    public function SetBirth(string $temp){
        $this->birth=$temp;
    }

    public function SetEmail(string $temp){
        $this->email=$temp;
    }

    public function SetPassword(string $temp){
        $this->password=$temp;
    }

    public function SetLogin(string $temp){
        return $this->login=$temp;
    }

}