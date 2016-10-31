<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCurrentHabit
 *
 * @ORM\Table(name="user_current_habit", indexes={@ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="habits_combination_id", columns={"habits_combination_id"})})
 * @ORM\Entity
 */
class UserCurrentHabit
{
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
     * @return UserCurrentHabit
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
     * @return UserCurrentHabit
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
