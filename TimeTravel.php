<?php

class TimeTravel
{
    private $start;
    private $end;

    public function __construct(DateTimeImmutable $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getTravelInfo(): string
    {
        $differences = $this->start->diff($this->end);
        return $differences->format('Il y a %Y années, %m mois, %d jours, %H heures, %i minutes et %s secondes de différence avec aujourd\'hui et le 31 decembre 1985').'<br>';
    }

    public function findDate(int $interval): DateTimeImmutable
    {
        $timeInterval = new DateInterval('PT' . $interval . 'S');
        $goal = $this->start->sub($timeInterval);
        $this->end = $goal;
        return $goal;
    }

    public function backToFutureStepByStep($step): array
    {
        $results = [];
        $periods = new DatePeriod($this->end, $step, $this->start);
        foreach ($periods as $date) {
            $results[] = $date->format('M, d, Y');

        }
        return $results;
    }

    /**
     * @param DateTime $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @param DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }
}