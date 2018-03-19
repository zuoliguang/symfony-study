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
	private $ext_info;
}