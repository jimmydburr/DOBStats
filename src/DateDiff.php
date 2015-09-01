<?PHP namespace JimmyDBurrell\DOBStats;

date_default_timezone_set('America/Chicago');

class DateDiff
{
	private $dateOne;
	private $dateTwo;

	public function __construct($earlierDate, $laterDate)
	{
		$this->dateOne = $earlierDate;
		$this->dateTwo = $laterDate;
	}

	public function diff()
	{
		$d1 = new \DateTime($this->dateOne);
		$d2 = new \DateTime($this->dateTwo);
		$diff = $d1->diff($d2);
		return $diff->days;
	}

}

?>
