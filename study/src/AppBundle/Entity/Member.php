<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="member")
 * @IgnoreAnnotation("fn")
 */
class Member
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
	private $name;

	/**
     * @ORM\Column(type="integer")
     */
    private $age;

	/**
     * @ORM\Column(type="string", length=30)
     */
	private $tel;

	/**
     * @ORM\Column(type="string", length=100)
     */
	private $address;

	/**
     * @ORM\Column(type="text")
     */
	private $extInfo;

	/* 切记：该字段最好不要使用下划线 “_” 链接字符，要使用驼峰命名法，系统才能找到，否则会报错 */

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
     * Set name
     *
     * @param string $name
     *
     * @return Member
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
     * Set age
     *
     * @param integer $age
     *
     * @return Member
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Member
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Member
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set extInfo
     *
     * @param string $extInfo
     *
     * @return Member
     */
    public function setExtInfo($extInfo)
    {
        $this->extInfo = $extInfo;

        return $this;
    }

    /**
     * Get extInfo
     *
     * @return string
     */
    public function getExtInfo()
    {
        return $this->extInfo;
    }
}
