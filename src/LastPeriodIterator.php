<?php namespace JimmyDBurrell\DOBStats;

class LastPeriodIterator extends FilterIterator
{
    protected $period;

    public function __construct(\Iterator $iterator, $period = 'last week')
    {
        parent::__construct($iterator);
        $this->period = $period;
    }
    public function accept()
    {
        if (!$this->getInnerIterator()->valid()) {
            return false;
        }
        $row = $this->getInnerIterator()->current();
        $dt = new \DateTime($this->period);
        if ($dt->format('Y-m-d') . '00:00:00' < $row->contact_modified) {
            return true;
        }
        return false;
    }
}
