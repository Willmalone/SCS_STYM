<?php

/* navbar_footer.html */
class __TwigTemplate_c4b214c258bed936a15ce12d6ad404e0d9b00375607177590cd07f97ac0e322d extends Twig_Template
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
        echo "<div class=\"navbar\" role=\"navigation\">
\t<div class=\"inner\">

\t<ul id=\"nav-footer\" class=\"nav-footer linklist\" role=\"menubar\">
\t\t<li class=\"breadcrumbs\">
\t\t\t";
        // line 6
        if ((isset($context["U_SITE_HOME"]) ? $context["U_SITE_HOME"] : null)) {
            // line 7
            echo "\t\t\t\t";
            ob_start();
            // line 8
            echo "\t\t\t\t<span class=\"crumb\">
\t\t\t\t\t<a href=\"";
            // line 9
            echo (isset($context["U_SITE_HOME"]) ? $context["U_SITE_HOME"] : null);
            echo "\" data-navbar-reference=\"home\">
\t\t\t\t\t\t<i class=\"icon fa-home fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 10
            echo $this->env->getExtension('phpbb')->lang("SITE_HOME");
            echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</span>
\t\t\t\t";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 14
            echo "\t\t\t";
        }
        // line 15
        echo "\t\t\t";
        // line 16
        echo "\t\t\t";
        ob_start();
        // line 17
        echo "\t\t\t<span class=\"crumb\">
\t\t\t\t<a href=\"";
        // line 18
        echo (isset($context["U_INDEX"]) ? $context["U_INDEX"] : null);
        echo "\" data-navbar-reference=\"index\">
\t\t\t\t\t";
        // line 19
        if ( !(isset($context["U_SITE_HOME"]) ? $context["U_SITE_HOME"] : null)) {
            echo "<i class=\"icon fa-home fa-fw\" aria-hidden=\"true\"></i>";
        }
        echo "<span>";
        echo $this->env->getExtension('phpbb')->lang("INDEX");
        echo "</span>
\t\t\t\t</a>
\t\t\t</span>
\t\t\t";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 23
        echo "\t\t\t";
        // line 24
        echo "\t\t</li>
\t\t";
        // line 25
        if (((isset($context["U_WATCH_FORUM_LINK"]) ? $context["U_WATCH_FORUM_LINK"] : null) &&  !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null))) {
            // line 26
            echo "\t\t\t<li data-last-responsive=\"true\">
\t\t\t\t<a href=\"";
            // line 27
            echo (isset($context["U_WATCH_FORUM_LINK"]) ? $context["U_WATCH_FORUM_LINK"] : null);
            echo "\" title=\"";
            echo (isset($context["S_WATCH_FORUM_TITLE"]) ? $context["S_WATCH_FORUM_TITLE"] : null);
            echo "\" data-ajax=\"toggle_link\" data-toggle-class=\"icon ";
            if ((isset($context["S_WATCHING_FORUM"]) ? $context["S_WATCHING_FORUM"] : null)) {
                echo "fa-check-square-o";
            } else {
                echo "fa-square-o";
            }
            echo " fa-fw\" data-toggle-text=\"";
            echo (isset($context["S_WATCH_FORUM_TOGGLE"]) ? $context["S_WATCH_FORUM_TOGGLE"] : null);
            echo "\" data-toggle-url=\"";
            echo (isset($context["U_WATCH_FORUM_TOGGLE"]) ? $context["U_WATCH_FORUM_TOGGLE"] : null);
            echo "\">
\t\t\t\t\t<i class=\"icon ";
            // line 28
            if ((isset($context["S_WATCHING_FORUM"]) ? $context["S_WATCHING_FORUM"] : null)) {
                echo "fa-square-o";
            } else {
                echo "fa-check-square-o";
            }
            echo " fa-fw\" aria-hidden=\"true\"></i><span>";
            echo (isset($context["S_WATCH_FORUM_TITLE"]) ? $context["S_WATCH_FORUM_TITLE"] : null);
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
        }
        // line 32
        echo "
\t\t";
        // line 33
        // line 34
        echo "\t\t<li class=\"rightside\">";
        echo (isset($context["S_TIMEZONE"]) ? $context["S_TIMEZONE"] : null);
        echo "</li>
\t\t";
        // line 35
        // line 36
        echo "\t\t";
        if ( !(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null)) {
            // line 37
            echo "\t\t\t<li class=\"rightside\">
\t\t\t\t<a href=\"";
            // line 38
            echo (isset($context["U_DELETE_COOKIES"]) ? $context["U_DELETE_COOKIES"] : null);
            echo "\" data-ajax=\"true\" data-refresh=\"true\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-trash fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 39
            echo $this->env->getExtension('phpbb')->lang("DELETE_COOKIES");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t";
            // line 42
            if ((isset($context["S_DISPLAY_MEMBERLIST"]) ? $context["S_DISPLAY_MEMBERLIST"] : null)) {
                // line 43
                echo "\t\t\t\t<li class=\"rightside\" data-last-responsive=\"true\">
\t\t\t\t\t<a href=\"";
                // line 44
                echo (isset($context["U_MEMBERLIST"]) ? $context["U_MEMBERLIST"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb')->lang("MEMBERLIST_EXPLAIN");
                echo "\" role=\"menuitem\">
\t\t\t\t\t\t<i class=\"icon fa-group fa-fw\" aria-hidden=\"true\"></i><span>";
                // line 45
                echo $this->env->getExtension('phpbb')->lang("MEMBERLIST");
                echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t";
            }
            // line 49
            echo "\t\t";
        }
        // line 50
        echo "\t\t";
        // line 51
        echo "\t\t";
        if ((isset($context["U_TEAM"]) ? $context["U_TEAM"] : null)) {
            // line 52
            echo "\t\t\t<li class=\"rightside\" data-last-responsive=\"true\">
\t\t\t\t<a href=\"";
            // line 53
            echo (isset($context["U_TEAM"]) ? $context["U_TEAM"] : null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-shield fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 54
            echo $this->env->getExtension('phpbb')->lang("THE_TEAM");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
        }
        // line 58
        echo "\t\t";
        // line 59
        echo "\t\t";
        if ((isset($context["U_CONTACT_US"]) ? $context["U_CONTACT_US"] : null)) {
            // line 60
            echo "\t\t\t<li class=\"rightside\" data-last-responsive=\"true\">
\t\t\t\t<a href=\"";
            // line 61
            echo (isset($context["U_CONTACT_US"]) ? $context["U_CONTACT_US"] : null);
            echo "\" role=\"menuitem\">
\t\t\t\t\t<i class=\"icon fa-envelope fa-fw\" aria-hidden=\"true\"></i><span>";
            // line 62
            echo $this->env->getExtension('phpbb')->lang("CONTACT_US");
            echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t";
        }
        // line 66
        echo "\t</ul>

\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "navbar_footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 66,  188 => 62,  184 => 61,  181 => 60,  178 => 59,  176 => 58,  169 => 54,  165 => 53,  162 => 52,  159 => 51,  157 => 50,  154 => 49,  147 => 45,  141 => 44,  138 => 43,  136 => 42,  130 => 39,  126 => 38,  123 => 37,  120 => 36,  119 => 35,  114 => 34,  113 => 33,  110 => 32,  97 => 28,  81 => 27,  78 => 26,  76 => 25,  73 => 24,  71 => 23,  60 => 19,  56 => 18,  53 => 17,  50 => 16,  48 => 15,  45 => 14,  38 => 10,  34 => 9,  31 => 8,  28 => 7,  26 => 6,  19 => 1,);
    }
}
/* <div class="navbar" role="navigation">*/
/* 	<div class="inner">*/
/* */
/* 	<ul id="nav-footer" class="nav-footer linklist" role="menubar">*/
/* 		<li class="breadcrumbs">*/
/* 			<!-- IF U_SITE_HOME -->*/
/* 				{% spaceless %}*/
/* 				<span class="crumb">*/
/* 					<a href="{U_SITE_HOME}" data-navbar-reference="home">*/
/* 						<i class="icon fa-home fa-fw" aria-hidden="true"></i><span>{L_SITE_HOME}</span>*/
/* 					</a>*/
/* 				</span>*/
/* 				{% endspaceless %}*/
/* 			<!-- ENDIF -->*/
/* 			<!-- EVENT overall_footer_breadcrumb_prepend -->*/
/* 			{% spaceless %}*/
/* 			<span class="crumb">*/
/* 				<a href="{U_INDEX}" data-navbar-reference="index">*/
/* 					<!-- IF not U_SITE_HOME --><i class="icon fa-home fa-fw" aria-hidden="true"></i><!-- ENDIF --><span>{L_INDEX}</span>*/
/* 				</a>*/
/* 			</span>*/
/* 			{% endspaceless %}*/
/* 			<!-- EVENT overall_footer_breadcrumb_append -->*/
/* 		</li>*/
/* 		<!-- IF U_WATCH_FORUM_LINK and not S_IS_BOT -->*/
/* 			<li data-last-responsive="true">*/
/* 				<a href="{U_WATCH_FORUM_LINK}" title="{S_WATCH_FORUM_TITLE}" data-ajax="toggle_link" data-toggle-class="icon <!-- IF S_WATCHING_FORUM -->fa-check-square-o<!-- ELSE -->fa-square-o<!-- ENDIF --> fa-fw" data-toggle-text="{S_WATCH_FORUM_TOGGLE}" data-toggle-url="{U_WATCH_FORUM_TOGGLE}">*/
/* 					<i class="icon <!-- IF S_WATCHING_FORUM -->fa-square-o<!-- ELSE -->fa-check-square-o<!-- ENDIF --> fa-fw" aria-hidden="true"></i><span>{S_WATCH_FORUM_TITLE}</span>*/
/* 				</a>*/
/* 			</li>*/
/* 		<!-- ENDIF -->*/
/* */
/* 		<!-- EVENT overall_footer_timezone_before -->*/
/* 		<li class="rightside">{S_TIMEZONE}</li>*/
/* 		<!-- EVENT overall_footer_timezone_after -->*/
/* 		<!-- IF not S_IS_BOT -->*/
/* 			<li class="rightside">*/
/* 				<a href="{U_DELETE_COOKIES}" data-ajax="true" data-refresh="true" role="menuitem">*/
/* 					<i class="icon fa-trash fa-fw" aria-hidden="true"></i><span>{L_DELETE_COOKIES}</span>*/
/* 				</a>*/
/* 			</li>*/
/* 			<!-- IF S_DISPLAY_MEMBERLIST -->*/
/* 				<li class="rightside" data-last-responsive="true">*/
/* 					<a href="{U_MEMBERLIST}" title="{L_MEMBERLIST_EXPLAIN}" role="menuitem">*/
/* 						<i class="icon fa-group fa-fw" aria-hidden="true"></i><span>{L_MEMBERLIST}</span>*/
/* 					</a>*/
/* 				</li>*/
/* 			<!-- ENDIF -->*/
/* 		<!-- ENDIF -->*/
/* 		<!-- EVENT overall_footer_teamlink_before -->*/
/* 		<!-- IF U_TEAM -->*/
/* 			<li class="rightside" data-last-responsive="true">*/
/* 				<a href="{U_TEAM}" role="menuitem">*/
/* 					<i class="icon fa-shield fa-fw" aria-hidden="true"></i><span>{L_THE_TEAM}</span>*/
/* 				</a>*/
/* 			</li>*/
/* 		<!-- ENDIF -->*/
/* 		<!-- EVENT overall_footer_teamlink_after -->*/
/* 		<!-- IF U_CONTACT_US -->*/
/* 			<li class="rightside" data-last-responsive="true">*/
/* 				<a href="{U_CONTACT_US}" role="menuitem">*/
/* 					<i class="icon fa-envelope fa-fw" aria-hidden="true"></i><span>{L_CONTACT_US}</span>*/
/* 				</a>*/
/* 			</li>*/
/* 		<!-- ENDIF -->*/
/* 	</ul>*/
/* */
/* 	</div>*/
/* </div>*/
/* */
