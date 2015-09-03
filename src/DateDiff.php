<?PHP namespace JimmyDBurrell\DOBStats;

date_default_timezone_set('America/Chicago');

/**
* DateDiff - a class that calculates the difference in days between
* two dates
*
* @DOBStatus
* @version //autogen//
* @copyright Copyright (c) 2015 All rights reserved.
* @author
* @license MIT
*/
class DateDiff
{
	private $dateOne;
	private $dateTwo;

	public function __construct($earlierDate, $laterDate)
	{
		$this->dateOne = $earlierDate;
		$this->dateTwo = $laterDate;
	}

	public function diffInDays()
	{
		$d1 = new \DateTime($this->dateOne);
		$d2 = new \DateTime($this->dateTwo);
		$diff = $d1->diff($d2);
		return $diff->days;
	}
}
?>
