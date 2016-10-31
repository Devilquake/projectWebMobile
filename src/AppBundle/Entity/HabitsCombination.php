<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HabitsCombination
 *
 * @ORM\Table(name="habits_combination", indexes={@ORM\Index(name="habit_id_1", columns={"habit_id_1"}), @ORM\Index(name="habit_id_2", columns={"habit_id_2"}), @ORM\Index(name="habit_id_3", columns={"habit_id_3"})})
 * @ORM\Entity
 */
class HabitsCombination
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Habits
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Habits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="habit_id_1", referencedColumnName="id")
     * })
     */
    private $habit1;

    /**
     * @var \AppBundle\Entity\Habits
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Habits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="habit_id_2", referencedColumnName="id")
     * })
     */
    private $habit2;

    /**
     * @var \AppBundle\Entity\Habits
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Habits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="habit_id_3", referencedColumnName="id")
     * })
     */
    private $habit3;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return HabitsCombination
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Set habit1
     *
     * @param \AppBundle\Entity\Habits $habit1
     *
     * @return HabitsCombination
     */
    public function setHabit1(\AppBundle\Entity\Habits $habit1 = null)
    {
        $this->habit1 = $habit1;

        return $this;
    }

    /**
     * Get habit1
     *
     * @return \AppBundle\Entity\Habits
     */
    public function getHabit1()
    {
        return $this->habit1;
    }

    /**
     * Set habit2
     *
     * @param \AppBundle\Entity\Habits $habit2
     *
     * @return HabitsCombination
     */
    public function setHabit2(\AppBundle\Entity\Habits $habit2 = null)
    {
        $this->habit2 = $habit2;

        return $this;
    }

    /**
     * Get habit2
     *
     * @return \AppBundle\Entity\Habits
     */
    public function getHabit2()
    {
        return $this->habit2;
    }

    /**
     * Set habit3
     *
     * @param \AppBundle\Entity\Habits $habit3
     *
     * @return HabitsCombination
     */
    public function setHabit3(\AppBundle\Entity\Habits $habit3 = null)
    {
        $this->habit3 = $habit3;

        return $this;
    }

    /**
     * Get habit3
     *
     * @return \AppBundle\Entity\Habits
     */
    public function getHabit3()
    {
        return $this->habit3;
    }
}
