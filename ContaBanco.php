<?php

class ContaBanco {
    private $nome;
    private $numConta;
    private $tipo;
    private $status;
    private $saldo;
    
    //construct
    public function ContaBanco(){
        $this->getStatus(False);
        $this->setSaldo(0.0);
    }
    
    //setters and getters
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }    
    public function getNumConta(){
        return $this->numConta;
    }
    public function setNumConta($numConta){
        $this->numConta = $numConta;
    }
    
    public function getTipo(){
        return $this->tipo;
    }    
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    
    public function getSaldo(){
        return $this->saldo;
    }
    public function setSaldo($saldo){
        $this->saldo = $saldo;
    }
    
    // outros metodos
    public function abrirConta($t){
        if($this->getStatus() == false){
            $conta = strtoupper($t);
            if($conta == "CP"){
                $this->setTipo($conta);
                $this->setStatus(true);
                $this->setSaldo(150.0);
                echo"<p>|| CONTA POUPANÇA ABERTA COM SUCESSO ||</p>";                
            }else if($conta == "CC"){
                $this->setTipo($conta);
                $this->setStatus(true);
                $this->setSaldo(50.0);
                echo"<p>|| CONTA CORRENTE ABERTA COM SUCESSO ||</p>";                
            }else{
                echo"<p>|| --- TIPO INVÁLIDO --- ||</p>";
            }
        }else{
            echo"<p>|| --- CONTA JÁ ABERTA --- ||</p>";
        }
    }
    
    public function fecharConta(){
        if($this->getStatus() == true){
            if($this->getSaldo() > 0){
                echo"<p>|| --- CONTA COM SALDO. NÃO É POSSÍVEL FECHAR--- ||<p>";
            }else if($this->getSaldo() < 0){
                echo"<p>|| --- CONTA EM DÉBITO. NÃO É POSSÍVEL FECHAR--- ||</p>";                
            }else if($this->getSaldo() == 0){
                echo"<p>|| CONTA ENCERRADA ||</p>";
                $this-> setStatus(false);
            }
        }else{
            echo"<p>|| --- CONTA JÁ FECHADA --- ||<p>";
        }
    }
    
    public function sacar($s){
        if($this->getStatus() == true){
            if($this->getSaldo() >= $s){
                $this->setSaldo($this->getSaldo() - $s);
                echo"<p>|| SAQUE DE R$ $s REALIZADO  ||</p>";
            }else if($this->getSaldo() < $s){
                echo"<p>|| --- SALDO INSUFICIENTE --- ||</p>";
            }
        }else{
            echo"<p>|| --- CONTA FECHADA --- ||</p>";
        }
    }
    
    public function depositar($s){
        if($this->getStatus() == true){
            $this->setSaldo($this->getSaldo() + $s);
                echo"<p>|| DEPOSITO DE R$ $s REALIZADO  ||</p>";
        }else{
            echo"<p>|| --- CONTA FECHADA --- ||</p>";
        }
    }
    
    public function pagarMensal(){
        $v = 0.0;
        if($this->getStatus() == true){
           if($this->getTipo() == "CP") {
               $v = 10.0;
           }else if($this->getTipo() == "CC"){
               $v = 20.0;
           }
           if($this->getSaldo() >= $v){
               $this->setSaldo($this-> getSaldo() - $v);
               echo"<p>|| PAGAMENTO MENSAL DE R$ $v REALIZADO  ||</p>";
           }else if($this->getSaldo() < $v){
               echo"<p>|| --- SALDO INSUFICIENTE --- ||</p>";
           }
        }else{
            echo"<p>|| --- CONTA FECHADA --- ||</p>";
        }
    }
    
    public function mostrarStatus(){        
        print"<hr><p>"
          . "||_NOME____|| => ".$this->getNome()." <br>"
          . "||_NÚMERO_|| => {$this->getNumConta()} <br>"
          . "||_TIPO_____|| => {$this->getTipo()} <br>"
          . "||_SALDO___|| => ".$this->getSaldo()." <br>"
          . "||_STATUS__|| => {$this->getStatus()} <br>"
          . "</p><hr><br><br>";          
    }    
        
    
}
