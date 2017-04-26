<?php

/* test.txt */
class __TwigTemplate_5d063faab5edf4b7649145e9bc802e1723f4609c9e63314f5b15cf530e84a921 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Subject: phpBB is correctly configured to send emails

Hello ";
        // line 3
        echo (isset($context["USERNAME"]) ? $context["USERNAME"] : null);
        echo ",

Congratulations. If you received this email, phpBB is correctly configured to send emails.

In case you require assistance, please visit the phpBB support forums - https://www.phpbb.com/community/

";
        // line 9
        echo (isset($context["EMAIL_SIG"]) ? $context["EMAIL_SIG"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "test.txt";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 9,  23 => 3,  19 => 1,);
    }
}
/* Subject: phpBB is correctly configured to send emails*/
/* */
/* Hello {USERNAME},*/
/* */
/* Congratulations. If you received this email, phpBB is correctly configured to send emails.*/
/* */
/* In case you require assistance, please visit the phpBB support forums - https://www.phpbb.com/community/*/
/* */
/* {EMAIL_SIG}*/
/* */
