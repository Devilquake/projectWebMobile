<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Results
 *
 * @ORM\Table(name="results", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="habits_combination_id", columns={"habits_combination_id"})})
 * @ORM\Entity
 */
class Results
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="habit_1", type="boolean", nullable=false)
     */
    private $habit1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="habit_2", type="boolean", nullable=false)
     */
    private $habit2;

    /**
     * @var boolean
     *
     * @ORM\Column(name="habit_3", type="boolean", nullable=false)
     */
    private $habit3;

    /**
     * @var integer
     *
     * @ORM\Column(name="calories", type="integer", nullable=false)
     */
    private $calories;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer", nullable=false)
     */
    private $weight;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\HabitsCombination
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\HabitsCombination")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="habits_combination_id", referencedColumnName="id")
     * })
     */
    private $habitsCombination;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Set habit1
     *
     * @param boolean $habit1
     *
     * @return Results
     */
    public function setHabit1($habit1)
    {
        $this->habit1 = $habit1;

        return $this;
    }

    /**
     * Get habit1
     *
     * @return boolean
     */
    public function getHabit1()
    {
        return $this->habit1;
    }

    /**
     * Set habit2
     *
     * @param boolean $habit2
     *
     * @return Results
     */
    public function setHabit2($habit2)
    {
        $this->habit2 = $habit2;

        return $this;
    }

    /**
     * Get habit2
     *
     * @return boolean
     */
    public function getHabit2()
    {
        return $this->habit2;
    }

    /**
     * Set habit3
     *
     * @param boolean $habit3
     *
     * @return Results
     */
    public function setHabit3($habit3)
    {
        $this->habit3 = $habit3;

        return $this;
    }

    /**
     * Get habit3
     *
     * @return boolean
     */
    public function getHabit3()
    {
        return $this->habit3;
    }

    /**
     * Set calories
     *
     * @param integer $calories
     *
     * @return Results
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;

        return $this;
    }

    /**
     * Get calories
     *
     * @return integer
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Results
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Results
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set habitsCombination
     *
     * @param \AppBundle\Entity\HabitsCombination $habitsCombination
     *
     * @return Results
     */
    public function setHabitsCombination(\AppBundle\Entity\HabitsCombination $habitsCombination = null)
    {
        $this->habitsCombination = $habitsCombination;

        return $this;
    }

    /**
     * Get habitsCombination
     *
     * @return \AppBundle\Entity\HabitsCombination
     */
    public function getHabitsCombination()
    {
        return $this->habitsCombination;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Results
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
