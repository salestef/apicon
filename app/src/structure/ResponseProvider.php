<?php

namespace ApiCondor\src\structure;

class ResponseProvider implements \JsonSerializable
{

    /** @var string|null $providerName Provider name. */
    private $providerName;

    /** @var int|null $users A user is a unique or new visitor to the website. */
    private $users;

    /** @var float|null The percentage of visitors who viewed only a single page. These visitors only triggered a single request to the Google Analytics server. */
    private $bounceRate;

    /** @var int|null The group of visitor interactions that happen in a 30-minute window of activity. */
    private $sessions;

    /** @var int|null How long on average each visitor stays on the site. */
    private $averageSessionDuration;

    /** @var int|null The percentage of website visits that are first-time visits.*/
    private $percentageNewSessions;

    /** @var int|null The average number of page views per each session. */
    private $pagesPerSession;

    /** @var int|null The number of times visitors complete a specified, desirable action. This is also known as a conversion. */
    private $goalCompletions;

    /** @var int|null Total number of pages viewed. */
    private $pageViews;

    /**
     * ResponseProvider constructor.
     * @param null|string $providerName
     * @param int|null $users
     * @param float|null $bounceRate
     * @param int|null $sessions
     * @param int|null $averageSessionDuration
     * @param int|null $percentageNewSessions
     * @param int|null $pagesPerSession
     * @param int|null $goalCompletions
     * @param int|null $pageViews
     */
    public function __construct(?string $providerName, ?int $users, ?float $bounceRate, ?int $sessions, ?int $averageSessionDuration, ?int $percentageNewSessions, ?int $pagesPerSession, ?int $goalCompletions, ?int $pageViews)
    {
        $this->providerName = $providerName;
        $this->users = $users;
        $this->bounceRate = $bounceRate;
        $this->sessions = $sessions;
        $this->averageSessionDuration = $averageSessionDuration;
        $this->percentageNewSessions = $percentageNewSessions;
        $this->pagesPerSession = $pagesPerSession;
        $this->goalCompletions = $goalCompletions;
        $this->pageViews = $pageViews;
    }

    /**
     * @return null|string
     */
    public function getProviderName(): ?string
    {
        return $this->providerName;
    }

    /**
     * @return int|null
     */
    public function getUsers(): ?int
    {
        return $this->users;
    }

    /**
     * @return float|null
     */
    public function getBounceRate(): ?float
    {
        return $this->bounceRate;
    }

    /**
     * @return int|null
     */
    public function getSessions(): ?int
    {
        return $this->sessions;
    }

    /**
     * @return int|null
     */
    public function getAverageSessionDuration(): ?int
    {
        return $this->averageSessionDuration;
    }

    /**
     * @return int|null
     */
    public function getPercentageNewSessions(): ?int
    {
        return $this->percentageNewSessions;
    }

    /**
     * @return int|null
     */
    public function getPagesPerSession(): ?int
    {
        return $this->pagesPerSession;
    }

    /**
     * @return int|null
     */
    public function getGoalCompletions(): ?int
    {
        return $this->goalCompletions;
    }

    /**
     * @return int|null
     */
    public function getPageViews(): ?int
    {
        return $this->pageViews;
    }

    /** @inheritdoc */
    function jsonSerialize()
    {
        return [
            strval($this->providerName) => [
                "users" => intval($this->getUsers()),
                "bounce_rate" => floatval($this->getBounceRate()),
                "sessions" => intval($this->getSessions()),
                "average_session_duration" => intval($this->getAverageSessionDuration()),
                "percentage_new_sessions" => intval($this->getPercentageNewSessions()),
                "pages_per_session" => intval($this->getPagesPerSession()),
                "goal_completions" => intval($this->getGoalCompletions()),
                "page_views" => intval($this->getPageViews())
            ]
        ];
    }

}