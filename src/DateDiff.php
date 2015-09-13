<?PHP namespace JimmyDBurrell\DOBStats;

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

	public function __construct($earlierDate, $laterDate = NULL)
	{
		$this->dateOne = $earlierDate;
		if ($laterDate === NULL) {
			$laterDate = date('Y-m-d');	// date now
		}
		$this->dateTwo = $laterDate;
	}

	public function diffInDays()
	{
		$d1 = new \DateTime($this->dateOne);
		$d2 = new \DateTime($this->dateTwo);
		$diff = $d1->diff($d2);
		return $diff->days;
	}

	public function diffInYears()
	{
		$d1 = new \DateTime($this->dateOne);
		$d2 = new \DateTime($this->dateTwo);
		$diff = $d1->diff($d2);
		return $diff->format('%Y');
	}
}
?>
