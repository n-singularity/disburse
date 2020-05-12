<?php


namespace App\Entities;

use App\Services\SimpleOrm\AbstractEntity;

class Disburse extends AbstractEntity
{
    protected $id;
    
    protected $amount;
    
    protected $status;
    
    protected $timestamp;
    
    protected $bank_code;
    
    protected $account_number;
    
    protected $beneficiary_name;
    
    protected $remark;
    
    protected $receipt;
    
    protected $time_served;
    
    protected $fee;
    
    /**
     * Disburse constructor.
     */
    public function __construct()
    {
        $this->tableName = 'disburses';
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    
    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }
    
    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }
    
    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }
    
    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
    
    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp): void
    {
        $this->timestamp = $timestamp;
    }
    
    /**
     * @return mixed
     */
    public function getBankCode()
    {
        return $this->bank_code;
    }
    
    /**
     * @param mixed $bank_code
     */
    public function setBankCode($bank_code): void
    {
        $this->bank_code = $bank_code;
    }
    
    /**
     * @return mixed
     */
    public function getAccountNumber()
    {
        return $this->account_number;
    }
    
    /**
     * @param mixed $account_number
     */
    public function setAccountNumber($account_number): void
    {
        $this->account_number = $account_number;
    }
    
    /**
     * @return mixed
     */
    public function getBeneficiaryName()
    {
        return $this->beneficiary_name;
    }
    
    /**
     * @param mixed $beneficiary_name
     */
    public function setBeneficiaryName($beneficiary_name): void
    {
        $this->beneficiary_name = $beneficiary_name;
    }
    
    /**
     * @return mixed
     */
    public function getRemark()
    {
        return $this->remark;
    }
    
    /**
     * @param mixed $remark
     */
    public function setRemark($remark): void
    {
        $this->remark = $remark;
    }
    
    /**
     * @return mixed
     */
    public function getReceipt()
    {
        return $this->receipt;
    }
    
    /**
     * @param mixed $receipt
     */
    public function setReceipt($receipt): void
    {
        $this->receipt = $receipt;
    }
    
    /**
     * @return mixed
     */
    public function getTimeServed()
    {
        return $this->time_served;
    }
    
    /**
     * @param mixed $time_served
     */
    public function setTimeServed($time_served): void
    {
        $this->time_served = $time_served;
    }
    
    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }
    
    /**
     * @param mixed $fee
     */
    public function setFee($fee): void
    {
        $this->fee = $fee;
    }
}