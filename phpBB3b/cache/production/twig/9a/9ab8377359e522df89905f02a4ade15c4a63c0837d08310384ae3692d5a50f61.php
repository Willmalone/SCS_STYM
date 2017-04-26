<?php

/* acp_profile.html */
class __TwigTemplate_bd25ddb98e1c35831bb40aa8729748a353b4e63b9d09d1fd7b6879168fe2e07e extends Twig_Template
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
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "acp_profile.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<a id=\"maincontent\"></a>

";
        // line 5
        if ((isset($context["S_EDIT"]) ? $context["S_EDIT"] : null)) {
            // line 6
            echo "
\t<a href=\"";
            // line 7
            echo (isset($context["U_BACK"]) ? $context["U_BACK"] : null);
            echo "\" style=\"float: ";
            echo (isset($context["S_CONTENT_FLOW_END"]) ? $context["S_CONTENT_FLOW_END"] : null);
            echo ";\">&laquo; ";
            echo $this->env->getExtension('phpbb')->lang("BACK");
            echo "</a>

\t<h1>";
            // line 9
            echo $this->env->getExtension('phpbb')->lang("TITLE");
            echo "</h1>

\t<p>";
            // line 11
            echo $this->env->getExtension('phpbb')->lang("EXPLAIN");
            echo "</p>

\t";
            // line 13
            if ((isset($context["ERROR_MSG"]) ? $context["ERROR_MSG"] : null)) {
                // line 14
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 15
                echo $this->env->getExtension('phpbb')->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 16
                echo (isset($context["ERROR_MSG"]) ? $context["ERROR_MSG"] : null);
                echo "</p>
\t\t</div>
\t";
            }
            // line 19
            echo "
\t<form id=\"add_profile_field\" method=\"post\" action=\"";
            // line 20
            echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
            echo "\"";
            echo (isset($context["S_FORM_ENCTYPE"]) ? $context["S_FORM_ENCTYPE"] : null);
            echo ">

\t";
            // line 22
            if ((isset($context["S_STEP_ONE"]) ? $context["S_STEP_ONE"] : null)) {
                // line 23
                echo "
\t\t<fieldset>
\t\t\t<legend>";
                // line 25
                echo $this->env->getExtension('phpbb')->lang("TITLE");
                echo "</legend>
\t\t<dl>
\t\t\t<dt><label>";
                // line 27
                echo $this->env->getExtension('phpbb')->lang("FIELD_TYPE");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("FIELD_TYPE_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><strong>";
                // line 28
                echo (isset($context["FIELD_TYPE"]) ? $context["FIELD_TYPE"] : null);
                echo "</strong></dd>
\t\t</dl>
\t\t";
                // line 30
                if ((isset($context["S_EDIT_MODE"]) ? $context["S_EDIT_MODE"] : null)) {
                    // line 31
                    echo "\t\t<dl>
\t\t\t<dt><label>";
                    // line 32
                    echo $this->env->getExtension('phpbb')->lang("FIELD_IDENT");
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo "</label><br /><span>";
                    echo $this->env->getExtension('phpbb')->lang("FIELD_IDENT_EXPLAIN");
                    echo "</span></dt>
\t\t\t<dd><input type=\"hidden\" name=\"field_ident\" value=\"";
                    // line 33
                    echo (isset($context["FIELD_IDENT"]) ? $context["FIELD_IDENT"] : null);
                    echo "\" /><strong>";
                    echo (isset($context["FIELD_IDENT"]) ? $context["FIELD_IDENT"] : null);
                    echo "</strong></dd>
\t\t</dl>
\t\t";
                } else {
                    // line 36
                    echo "\t\t<dl>
\t\t\t<dt><label for=\"field_ident\">";
                    // line 37
                    echo $this->env->getExtension('phpbb')->lang("FIELD_IDENT");
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo "</label><br /><span>";
                    echo $this->env->getExtension('phpbb')->lang("FIELD_IDENT_EXPLAIN");
                    echo "</span></dt>
\t\t\t<dd><input class=\"text medium\" type=\"text\" id=\"field_ident\" name=\"field_ident\" value=\"";
                    // line 38
                    echo (isset($context["FIELD_IDENT"]) ? $context["FIELD_IDENT"] : null);
                    echo "\" /></dd>
\t\t</dl>
\t\t";
                }
                // line 41
                echo "\t\t<dl>
\t\t\t<dt><label for=\"field_no_view\">";
                // line 42
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_PROFILE_FIELD");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_PROFILE_FIELD_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><label><input type=\"radio\" class=\"radio\" id=\"field_no_view\" name=\"field_no_view\" value=\"0\"";
                // line 43
                if ( !(isset($context["S_FIELD_NO_VIEW"]) ? $context["S_FIELD_NO_VIEW"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /> ";
                echo $this->env->getExtension('phpbb')->lang("YES");
                echo "</label>
\t\t\t\t<label><input type=\"radio\" class=\"radio\" name=\"field_no_view\" value=\"1\"";
                // line 44
                if ((isset($context["S_FIELD_NO_VIEW"]) ? $context["S_FIELD_NO_VIEW"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /> ";
                echo $this->env->getExtension('phpbb')->lang("NO");
                echo "</label></dd>
\t\t</dl>
\t\t</fieldset>

\t\t<fieldset>
\t\t\t<legend>";
                // line 49
                echo $this->env->getExtension('phpbb')->lang("VISIBILITY_OPTION");
                echo "</legend>
\t\t<dl>
\t\t\t<dt><label for=\"field_show_profile\">";
                // line 51
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_AT_PROFILE");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_AT_PROFILE_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"field_show_profile\" name=\"field_show_profile\" value=\"1\"";
                // line 52
                if ((isset($context["S_SHOW_PROFILE"]) ? $context["S_SHOW_PROFILE"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"field_show_on_reg\">";
                // line 55
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_AT_REGISTER");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_AT_REGISTER_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"field_show_on_reg\" name=\"field_show_on_reg\" value=\"1\"";
                // line 56
                if ((isset($context["S_SHOW_ON_REG"]) ? $context["S_SHOW_ON_REG"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"field_show_on_pm\">";
                // line 59
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_ON_PM");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_ON_PM_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"field_show_on_pm\" name=\"field_show_on_pm\" value=\"1\"";
                // line 60
                if ((isset($context["S_SHOW_ON_PM"]) ? $context["S_SHOW_ON_PM"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"field_show_on_vt\">";
                // line 63
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_ON_VT");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_ON_VT_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"field_show_on_vt\" name=\"field_show_on_vt\" value=\"1\"";
                // line 64
                if ((isset($context["S_SHOW_ON_VT"]) ? $context["S_SHOW_ON_VT"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"field_show_on_ml\">";
                // line 67
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_ON_MEMBERLIST");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("DISPLAY_ON_MEMBERLIST_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"field_show_on_ml\" name=\"field_show_on_ml\" value=\"1\"";
                // line 68
                if ((isset($context["S_SHOW_ON_MEMBERLIST"]) ? $context["S_SHOW_ON_MEMBERLIST"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"field_required\">";
                // line 71
                echo $this->env->getExtension('phpbb')->lang("REQUIRED_FIELD");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("REQUIRED_FIELD_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"field_required\" name=\"field_required\" value=\"1\"";
                // line 72
                if ((isset($context["S_FIELD_REQUIRED"]) ? $context["S_FIELD_REQUIRED"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"field_show_novalue\">";
                // line 75
                echo $this->env->getExtension('phpbb')->lang("SHOW_NOVALUE_FIELD");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("SHOW_NOVALUE_FIELD_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"field_show_novalue\" name=\"field_show_novalue\" value=\"1\"";
                // line 76
                if ((isset($context["S_FIELD_SHOW_NOVALUE"]) ? $context["S_FIELD_SHOW_NOVALUE"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"field_hide\">";
                // line 79
                echo $this->env->getExtension('phpbb')->lang("HIDE_PROFILE_FIELD");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("HIDE_PROFILE_FIELD_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"field_hide\" name=\"field_hide\" value=\"1\"";
                // line 80
                if ((isset($context["S_FIELD_HIDE"]) ? $context["S_FIELD_HIDE"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t</dl>
\t\t";
                // line 82
                // line 83
                echo "\t\t<dl>
\t\t\t<dt><label for=\"field_is_contact\">";
                // line 84
                echo $this->env->getExtension('phpbb')->lang("FIELD_IS_CONTACT");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("FIELD_IS_CONTACT_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><input type=\"checkbox\" class=\"radio\" id=\"field_is_contact\" name=\"field_is_contact\" value=\"1\"";
                // line 85
                if ((isset($context["S_FIELD_CONTACT"]) ? $context["S_FIELD_CONTACT"] : null)) {
                    echo " checked=\"checked\"";
                }
                echo " /></dd>
\t\t\t<dd><input class=\"text medium\" type=\"text\" name=\"field_contact_desc\" id=\"field_contact_desc\" value=\"";
                // line 86
                echo (isset($context["FIELD_CONTACT_DESC"]) ? $context["FIELD_CONTACT_DESC"] : null);
                echo "\" /> <label for=\"field_contact_desc\">";
                echo $this->env->getExtension('phpbb')->lang("FIELD_CONTACT_DESC");
                echo "</label></dd>
\t\t\t<dd><input class=\"text medium\" type=\"text\" name=\"field_contact_url\" id=\"field_contact_url\" value=\"";
                // line 87
                echo (isset($context["FIELD_CONTACT_URL"]) ? $context["FIELD_CONTACT_URL"] : null);
                echo "\" /> <label for=\"field_contact_url\">";
                echo $this->env->getExtension('phpbb')->lang("FIELD_CONTACT_URL");
                echo "</label></dd>
\t\t</dl>
\t\t</fieldset>

\t\t";
                // line 91
                if ((isset($context["S_EDIT_MODE"]) ? $context["S_EDIT_MODE"] : null)) {
                    // line 92
                    echo "\t\t\t<fieldset class=\"quick\">
\t\t\t\t<input class=\"button1\" type=\"submit\" name=\"save\" value=\"";
                    // line 93
                    echo $this->env->getExtension('phpbb')->lang("SAVE");
                    echo "\" />
\t\t\t</fieldset>
\t\t";
                }
                // line 96
                echo "
\t\t<fieldset>
\t\t\t<legend>";
                // line 98
                echo $this->env->getExtension('phpbb')->lang("LANG_SPECIFIC");
                echo "</legend>
\t\t<dl>
\t\t\t<dt><label for=\"lang_name\">";
                // line 100
                echo $this->env->getExtension('phpbb')->lang("USER_FIELD_NAME");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label></dt>
\t\t\t<dd><input class=\"text medium\" type=\"text\" id=\"lang_name\" name=\"lang_name\" value=\"";
                // line 101
                echo (isset($context["LANG_NAME"]) ? $context["LANG_NAME"] : null);
                echo "\" /></dd>
\t\t</dl>
\t\t<dl>
\t\t\t<dt><label for=\"lang_explain\">";
                // line 104
                echo $this->env->getExtension('phpbb')->lang("FIELD_DESCRIPTION");
                echo $this->env->getExtension('phpbb')->lang("COLON");
                echo "</label><br /><span>";
                echo $this->env->getExtension('phpbb')->lang("FIELD_DESCRIPTION_EXPLAIN");
                echo "</span></dt>
\t\t\t<dd><textarea id=\"lang_explain\" name=\"lang_explain\" rows=\"3\" cols=\"80\">";
                // line 105
                echo (isset($context["LANG_EXPLAIN"]) ? $context["LANG_EXPLAIN"] : null);
                echo "</textarea></dd>
\t\t</dl>
\t\t";
                // line 107
                if (((isset($context["S_TEXT"]) ? $context["S_TEXT"] : null) || (isset($context["S_STRING"]) ? $context["S_STRING"] : null))) {
                    // line 108
                    echo "\t\t\t<dl>
\t\t\t\t<dt><label for=\"lang_default_value\">";
                    // line 109
                    echo $this->env->getExtension('phpbb')->lang("DEFAULT_VALUE");
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo "</label><br /><span>";
                    echo $this->env->getExtension('phpbb')->lang("DEFAULT_VALUE_EXPLAIN");
                    echo "</span></dt>
\t\t\t\t<dd>";
                    // line 110
                    if ((isset($context["S_STRING"]) ? $context["S_STRING"] : null)) {
                        echo "<input class=\"text medium\" type=\"text\" id=\"lang_default_value\" name=\"lang_default_value\" value=\"";
                        echo (isset($context["LANG_DEFAULT_VALUE"]) ? $context["LANG_DEFAULT_VALUE"] : null);
                        echo "\" />";
                    } else {
                        echo "<textarea id=\"lang_default_value\" name=\"lang_default_value\" rows=\"5\" cols=\"80\">";
                        echo (isset($context["LANG_DEFAULT_VALUE"]) ? $context["LANG_DEFAULT_VALUE"] : null);
                        echo "</textarea>";
                    }
                    echo "</dd>
\t\t\t</dl>
\t\t";
                }
                // line 113
                echo "\t\t";
                if (((isset($context["S_BOOL"]) ? $context["S_BOOL"] : null) || (isset($context["S_DROPDOWN"]) ? $context["S_DROPDOWN"] : null))) {
                    // line 114
                    echo "\t\t\t<dl>
\t\t\t\t<dt><label for=\"lang_options\">";
                    // line 115
                    echo $this->env->getExtension('phpbb')->lang("ENTRIES");
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo "</label>
\t\t\t\t\t";
                    // line 116
                    if (((isset($context["S_EDIT_MODE"]) ? $context["S_EDIT_MODE"] : null) && (isset($context["S_DROPDOWN"]) ? $context["S_DROPDOWN"] : null))) {
                        // line 117
                        echo "\t\t\t\t\t\t<br /><span>";
                        echo $this->env->getExtension('phpbb')->lang("EDIT_DROPDOWN_LANG_EXPLAIN");
                        echo "</span>
\t\t\t\t\t";
                    } else {
                        // line 119
                        echo "\t\t\t\t\t\t<br /><span>";
                        echo $this->env->getExtension('phpbb')->lang("LANG_OPTIONS_EXPLAIN");
                        echo "</span>
\t\t\t\t\t";
                    }
                    // line 121
                    echo "\t\t\t\t</dt>
\t\t\t";
                    // line 122
                    if ((isset($context["S_DROPDOWN"]) ? $context["S_DROPDOWN"] : null)) {
                        // line 123
                        echo "\t\t\t\t<dd><textarea id=\"lang_options\" name=\"lang_options\" rows=\"5\" cols=\"80\">";
                        echo (isset($context["LANG_OPTIONS"]) ? $context["LANG_OPTIONS"] : null);
                        echo "</textarea></dd>
\t\t\t";
                    } else {
                        // line 125
                        echo "\t\t\t\t<dd><input class=\"medium\" id=\"lang_options\" name=\"lang_options[0]\" value=\"";
                        echo (isset($context["FIRST_LANG_OPTION"]) ? $context["FIRST_LANG_OPTION"] : null);
                        echo "\" /> ";
                        echo $this->env->getExtension('phpbb')->lang("FIRST_OPTION");
                        echo "</dd>
\t\t\t\t<dd><input class=\"medium\" name=\"lang_options[1]\" value=\"";
                        // line 126
                        echo (isset($context["SECOND_LANG_OPTION"]) ? $context["SECOND_LANG_OPTION"] : null);
                        echo "\" /> ";
                        echo $this->env->getExtension('phpbb')->lang("SECOND_OPTION");
                        echo "</dd>
\t\t\t";
                    }
                    // line 128
                    echo "\t\t\t</dl>
\t\t";
                }
                // line 130
                echo "\t\t";
                // line 131
                echo "\t\t</fieldset>

\t\t<fieldset class=\"quick\">
\t\t\t";
                // line 134
                echo (isset($context["S_HIDDEN_FIELDS"]) ? $context["S_HIDDEN_FIELDS"] : null);
                echo "
\t\t\t";
                // line 135
                echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
                echo "
\t\t\t<input class=\"button1\" type=\"submit\" name=\"next\" value=\"";
                // line 136
                echo $this->env->getExtension('phpbb')->lang("PROFILE_TYPE_OPTIONS");
                echo "\" />
\t\t</fieldset>

\t";
            } elseif (            // line 139
(isset($context["S_STEP_TWO"]) ? $context["S_STEP_TWO"] : null)) {
                // line 140
                echo "
\t\t<fieldset>
\t\t\t<legend>";
                // line 142
                echo $this->env->getExtension('phpbb')->lang("TITLE");
                echo "</legend>
\t\t";
                // line 143
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "option", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                    // line 144
                    echo "\t\t\t<dl>
\t\t\t\t<dt><label>";
                    // line 145
                    echo $this->getAttribute($context["option"], "TITLE", array());
                    echo $this->env->getExtension('phpbb')->lang("COLON");
                    echo "</label>";
                    if ($this->getAttribute($context["option"], "EXPLAIN", array())) {
                        echo "<br /><span>";
                        echo $this->getAttribute($context["option"], "EXPLAIN", array());
                        echo "</span>";
                    }
                    echo "</dt>
\t\t\t\t<dd>";
                    // line 146
                    echo $this->getAttribute($context["option"], "FIELD", array());
                    echo "</dd>
\t\t\t</dl>
\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 149
                echo "\t\t</fieldset>

\t\t<fieldset class=\"quick\" style=\"float: ";
                // line 151
                echo (isset($context["S_CONTENT_FLOW_BEGIN"]) ? $context["S_CONTENT_FLOW_BEGIN"] : null);
                echo ";\">
\t\t\t<input class=\"button1\" type=\"submit\" name=\"prev\" value=\"";
                // line 152
                echo $this->env->getExtension('phpbb')->lang("PROFILE_BASIC_OPTIONS");
                echo "\" />
\t\t</fieldset>

\t\t<fieldset class=\"quick\" style=\"float: ";
                // line 155
                echo (isset($context["S_CONTENT_FLOW_END"]) ? $context["S_CONTENT_FLOW_END"] : null);
                echo ";\">
\t\t\t";
                // line 156
                echo (isset($context["S_HIDDEN_FIELDS"]) ? $context["S_HIDDEN_FIELDS"] : null);
                echo "
\t\t\t";
                // line 157
                echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
                echo "
\t\t\t<input class=\"button1\" type=\"submit\" name=\"next\" value=\"";
                // line 158
                echo $this->env->getExtension('phpbb')->lang("NEXT_STEP");
                echo "\" />
\t\t</fieldset>

\t";
            } elseif (            // line 161
(isset($context["S_STEP_THREE"]) ? $context["S_STEP_THREE"] : null)) {
                // line 162
                echo "
\t\t";
                // line 163
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "options", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["options"]) {
                    // line 164
                    echo "\t\t\t<fieldset>
\t\t\t\t<legend>";
                    // line 165
                    echo $this->getAttribute($context["options"], "LANGUAGE", array());
                    echo "</legend>
\t\t\t";
                    // line 166
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["options"], "field", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 167
                        echo "\t\t\t\t<dl>
\t\t\t\t\t<dt><label>";
                        // line 168
                        echo $this->getAttribute($context["field"], "L_TITLE", array());
                        echo $this->env->getExtension('phpbb')->lang("COLON");
                        echo "</label>";
                        if ($this->getAttribute($context["field"], "L_EXPLAIN", array())) {
                            echo "<br /><span>";
                            echo $this->getAttribute($context["field"], "L_EXPLAIN", array());
                            echo "</span>";
                        }
                        echo "</dt>
\t\t\t\t\t";
                        // line 169
                        echo $this->getAttribute($context["field"], "FIELD", array());
                        echo "
\t\t\t\t</dl>
\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 172
                    echo "\t\t\t</fieldset>
\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['options'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 174
                echo "
\t\t<fieldset class=\"quick\" style=\"float: ";
                // line 175
                echo (isset($context["S_CONTENT_FLOW_BEGIN"]) ? $context["S_CONTENT_FLOW_BEGIN"] : null);
                echo ";\">
\t\t\t<input class=\"button1\" type=\"submit\" name=\"prev\" value=\"";
                // line 176
                echo $this->env->getExtension('phpbb')->lang("PROFILE_TYPE_OPTIONS");
                echo "\" />
\t\t</fieldset>

\t\t<fieldset class=\"quick\" style=\"float: ";
                // line 179
                echo (isset($context["S_CONTENT_FLOW_END"]) ? $context["S_CONTENT_FLOW_END"] : null);
                echo ";\">
\t\t\t";
                // line 180
                echo (isset($context["S_HIDDEN_FIELDS"]) ? $context["S_HIDDEN_FIELDS"] : null);
                echo "
\t\t\t<input class=\"button1\" type=\"submit\" name=\"save\" value=\"";
                // line 181
                echo $this->env->getExtension('phpbb')->lang("SAVE");
                echo "\" />
\t\t\t";
                // line 182
                echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
                echo "
\t\t</fieldset>

\t";
            }
            // line 186
            echo "
\t</form>

";
        } else {
            // line 190
            echo "
\t<h1>";
            // line 191
            echo $this->env->getExtension('phpbb')->lang("ACP_CUSTOM_PROFILE_FIELDS");
            echo "</h1>

\t";
            // line 193
            if ((isset($context["S_NEED_EDIT"]) ? $context["S_NEED_EDIT"] : null)) {
                // line 194
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 195
                echo $this->env->getExtension('phpbb')->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 196
                echo $this->env->getExtension('phpbb')->lang("CUSTOM_FIELDS_NOT_TRANSLATED");
                echo "</p>
\t\t</div>
\t";
            }
            // line 199
            echo "
\t<table class=\"table1 zebra-table\">
\t<thead>
\t<tr>
\t\t<th>";
            // line 203
            echo $this->env->getExtension('phpbb')->lang("FIELD_IDENT");
            echo "</th>
\t\t<th>";
            // line 204
            echo $this->env->getExtension('phpbb')->lang("FIELD_TYPE");
            echo "</th>
\t\t<th colspan=\"2\">";
            // line 205
            echo $this->env->getExtension('phpbb')->lang("OPTIONS");
            echo "</th>
\t</tr>
\t</thead>
\t<tbody>
\t";
            // line 209
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["loops"]) ? $context["loops"] : null), "fields", array()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["fields"]) {
                // line 210
                echo "\t<tr>
\t\t<td>";
                // line 211
                echo $this->getAttribute($context["fields"], "FIELD_IDENT", array());
                echo "</td>
\t\t<td>";
                // line 212
                echo $this->getAttribute($context["fields"], "FIELD_TYPE", array());
                echo "</td>
\t\t<td style=\"text-align: center;\"><a href=\"";
                // line 213
                echo $this->getAttribute($context["fields"], "U_ACTIVATE_DEACTIVATE", array());
                echo "\" data-ajax=\"activate_deactivate\">";
                echo $this->getAttribute($context["fields"], "L_ACTIVATE_DEACTIVATE", array());
                echo "</a>";
                if ($this->getAttribute($context["fields"], "S_NEED_EDIT", array())) {
                    echo " | <a href=\"";
                    echo $this->getAttribute($context["fields"], "U_TRANSLATE", array());
                    echo "\" style=\"color: red;\">";
                    echo $this->env->getExtension('phpbb')->lang("TRANSLATE");
                    echo "</a>";
                }
                echo "</td>

\t\t<td class=\"actions\" style=\"width: 80px;\">
\t\t\t<span class=\"up-disabled\" style=\"display:none;\">";
                // line 216
                echo (isset($context["ICON_MOVE_UP_DISABLED"]) ? $context["ICON_MOVE_UP_DISABLED"] : null);
                echo "</span>
\t\t\t<span class=\"up\"><a href=\"";
                // line 217
                echo $this->getAttribute($context["fields"], "U_MOVE_UP", array());
                echo "\" data-ajax=\"row_up\">";
                echo (isset($context["ICON_MOVE_UP"]) ? $context["ICON_MOVE_UP"] : null);
                echo "</a></span>
\t\t\t<span class=\"down-disabled\" style=\"display:none;\">";
                // line 218
                echo (isset($context["ICON_MOVE_DOWN_DISABLED"]) ? $context["ICON_MOVE_DOWN_DISABLED"] : null);
                echo "</span>
\t\t\t<span class=\"down\"><a href=\"";
                // line 219
                echo $this->getAttribute($context["fields"], "U_MOVE_DOWN", array());
                echo "\" data-ajax=\"row_down\">";
                echo (isset($context["ICON_MOVE_DOWN"]) ? $context["ICON_MOVE_DOWN"] : null);
                echo "</a></span>
\t\t\t";
                // line 220
                if ( !$this->getAttribute($context["fields"], "S_NEED_EDIT", array())) {
                    // line 221
                    echo "\t\t\t\t<a href=\"";
                    echo $this->getAttribute($context["fields"], "U_EDIT", array());
                    echo "\">";
                    echo (isset($context["ICON_EDIT"]) ? $context["ICON_EDIT"] : null);
                    echo "</a>
\t\t\t";
                } else {
                    // line 223
                    echo "\t\t\t\t";
                    echo (isset($context["ICON_EDIT_DISABLED"]) ? $context["ICON_EDIT_DISABLED"] : null);
                    echo "
\t\t\t";
                }
                // line 225
                echo "\t\t\t<a href=\"";
                echo $this->getAttribute($context["fields"], "U_DELETE", array());
                echo "\" data-ajax=\"row_delete\">";
                echo (isset($context["ICON_DELETE"]) ? $context["ICON_DELETE"] : null);
                echo "</a>
\t\t</td>

\t</tr>
\t";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 230
                echo "\t<tr class=\"row3\">
\t\t<td colspan=\"4\">";
                // line 231
                echo $this->env->getExtension('phpbb')->lang("ACP_NO_ITEMS");
                echo "</td>
\t</tr>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 234
            echo "\t</tbody>
\t</table>

\t<form id=\"profile_fields\" method=\"post\" action=\"";
            // line 237
            echo (isset($context["U_ACTION"]) ? $context["U_ACTION"] : null);
            echo "\">

\t<fieldset class=\"quick\">
\t\t<input class=\"text small\" type=\"text\" name=\"field_ident\" /> <select name=\"field_type\">";
            // line 240
            echo (isset($context["S_TYPE_OPTIONS"]) ? $context["S_TYPE_OPTIONS"] : null);
            echo "</select>
\t\t<input class=\"button1\" type=\"submit\" name=\"submit\" value=\"";
            // line 241
            echo $this->env->getExtension('phpbb')->lang("CREATE_NEW_FIELD");
            echo "\" />
\t\t<input type=\"hidden\" name=\"create\" value=\"1\" />
\t\t";
            // line 243
            echo (isset($context["S_FORM_TOKEN"]) ? $context["S_FORM_TOKEN"] : null);
            echo "
\t</fieldset>
\t</form>

";
        }
        // line 248
        echo "
";
        // line 249
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "acp_profile.html", 249)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "acp_profile.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  799 => 249,  796 => 248,  788 => 243,  783 => 241,  779 => 240,  773 => 237,  768 => 234,  759 => 231,  756 => 230,  743 => 225,  737 => 223,  729 => 221,  727 => 220,  721 => 219,  717 => 218,  711 => 217,  707 => 216,  691 => 213,  687 => 212,  683 => 211,  680 => 210,  675 => 209,  668 => 205,  664 => 204,  660 => 203,  654 => 199,  648 => 196,  644 => 195,  641 => 194,  639 => 193,  634 => 191,  631 => 190,  625 => 186,  618 => 182,  614 => 181,  610 => 180,  606 => 179,  600 => 176,  596 => 175,  593 => 174,  586 => 172,  577 => 169,  566 => 168,  563 => 167,  559 => 166,  555 => 165,  552 => 164,  548 => 163,  545 => 162,  543 => 161,  537 => 158,  533 => 157,  529 => 156,  525 => 155,  519 => 152,  515 => 151,  511 => 149,  502 => 146,  491 => 145,  488 => 144,  484 => 143,  480 => 142,  476 => 140,  474 => 139,  468 => 136,  464 => 135,  460 => 134,  455 => 131,  453 => 130,  449 => 128,  442 => 126,  435 => 125,  429 => 123,  427 => 122,  424 => 121,  418 => 119,  412 => 117,  410 => 116,  405 => 115,  402 => 114,  399 => 113,  385 => 110,  378 => 109,  375 => 108,  373 => 107,  368 => 105,  361 => 104,  355 => 101,  350 => 100,  345 => 98,  341 => 96,  335 => 93,  332 => 92,  330 => 91,  321 => 87,  315 => 86,  309 => 85,  302 => 84,  299 => 83,  298 => 82,  291 => 80,  284 => 79,  276 => 76,  269 => 75,  261 => 72,  254 => 71,  246 => 68,  239 => 67,  231 => 64,  224 => 63,  216 => 60,  209 => 59,  201 => 56,  194 => 55,  186 => 52,  179 => 51,  174 => 49,  162 => 44,  154 => 43,  147 => 42,  144 => 41,  138 => 38,  131 => 37,  128 => 36,  120 => 33,  113 => 32,  110 => 31,  108 => 30,  103 => 28,  96 => 27,  91 => 25,  87 => 23,  85 => 22,  78 => 20,  75 => 19,  69 => 16,  65 => 15,  62 => 14,  60 => 13,  55 => 11,  50 => 9,  41 => 7,  38 => 6,  36 => 5,  31 => 2,  19 => 1,);
    }
}
/* <!-- INCLUDE overall_header.html -->*/
/* */
/* <a id="maincontent"></a>*/
/* */
/* <!-- IF S_EDIT -->*/
/* */
/* 	<a href="{U_BACK}" style="float: {S_CONTENT_FLOW_END};">&laquo; {L_BACK}</a>*/
/* */
/* 	<h1>{L_TITLE}</h1>*/
/* */
/* 	<p>{L_EXPLAIN}</p>*/
/* */
/* 	<!-- IF ERROR_MSG -->*/
/* 		<div class="errorbox">*/
/* 			<h3>{L_WARNING}</h3>*/
/* 			<p>{ERROR_MSG}</p>*/
/* 		</div>*/
/* 	<!-- ENDIF -->*/
/* */
/* 	<form id="add_profile_field" method="post" action="{U_ACTION}"{S_FORM_ENCTYPE}>*/
/* */
/* 	<!-- IF S_STEP_ONE -->*/
/* */
/* 		<fieldset>*/
/* 			<legend>{L_TITLE}</legend>*/
/* 		<dl>*/
/* 			<dt><label>{L_FIELD_TYPE}{L_COLON}</label><br /><span>{L_FIELD_TYPE_EXPLAIN}</span></dt>*/
/* 			<dd><strong>{FIELD_TYPE}</strong></dd>*/
/* 		</dl>*/
/* 		<!-- IF S_EDIT_MODE -->*/
/* 		<dl>*/
/* 			<dt><label>{L_FIELD_IDENT}{L_COLON}</label><br /><span>{L_FIELD_IDENT_EXPLAIN}</span></dt>*/
/* 			<dd><input type="hidden" name="field_ident" value="{FIELD_IDENT}" /><strong>{FIELD_IDENT}</strong></dd>*/
/* 		</dl>*/
/* 		<!-- ELSE -->*/
/* 		<dl>*/
/* 			<dt><label for="field_ident">{L_FIELD_IDENT}{L_COLON}</label><br /><span>{L_FIELD_IDENT_EXPLAIN}</span></dt>*/
/* 			<dd><input class="text medium" type="text" id="field_ident" name="field_ident" value="{FIELD_IDENT}" /></dd>*/
/* 		</dl>*/
/* 		<!-- ENDIF -->*/
/* 		<dl>*/
/* 			<dt><label for="field_no_view">{L_DISPLAY_PROFILE_FIELD}{L_COLON}</label><br /><span>{L_DISPLAY_PROFILE_FIELD_EXPLAIN}</span></dt>*/
/* 			<dd><label><input type="radio" class="radio" id="field_no_view" name="field_no_view" value="0"<!-- IF not S_FIELD_NO_VIEW --> checked="checked"<!-- ENDIF --> /> {L_YES}</label>*/
/* 				<label><input type="radio" class="radio" name="field_no_view" value="1"<!-- IF S_FIELD_NO_VIEW --> checked="checked"<!-- ENDIF --> /> {L_NO}</label></dd>*/
/* 		</dl>*/
/* 		</fieldset>*/
/* */
/* 		<fieldset>*/
/* 			<legend>{L_VISIBILITY_OPTION}</legend>*/
/* 		<dl>*/
/* 			<dt><label for="field_show_profile">{L_DISPLAY_AT_PROFILE}{L_COLON}</label><br /><span>{L_DISPLAY_AT_PROFILE_EXPLAIN}</span></dt>*/
/* 			<dd><input type="checkbox" class="radio" id="field_show_profile" name="field_show_profile" value="1"<!-- IF S_SHOW_PROFILE --> checked="checked"<!-- ENDIF --> /></dd>*/
/* 		</dl>*/
/* 		<dl>*/
/* 			<dt><label for="field_show_on_reg">{L_DISPLAY_AT_REGISTER}{L_COLON}</label><br /><span>{L_DISPLAY_AT_REGISTER_EXPLAIN}</span></dt>*/
/* 			<dd><input type="checkbox" class="radio" id="field_show_on_reg" name="field_show_on_reg" value="1"<!-- IF S_SHOW_ON_REG --> checked="checked"<!-- ENDIF --> /></dd>*/
/* 		</dl>*/
/* 		<dl>*/
/* 			<dt><label for="field_show_on_pm">{L_DISPLAY_ON_PM}{L_COLON}</label><br /><span>{L_DISPLAY_ON_PM_EXPLAIN}</span></dt>*/
/* 			<dd><input type="checkbox" class="radio" id="field_show_on_pm" name="field_show_on_pm" value="1"<!-- IF S_SHOW_ON_PM --> checked="checked"<!-- ENDIF --> /></dd>*/
/* 		</dl>*/
/* 		<dl>*/
/* 			<dt><label for="field_show_on_vt">{L_DISPLAY_ON_VT}{L_COLON}</label><br /><span>{L_DISPLAY_ON_VT_EXPLAIN}</span></dt>*/
/* 			<dd><input type="checkbox" class="radio" id="field_show_on_vt" name="field_show_on_vt" value="1"<!-- IF S_SHOW_ON_VT --> checked="checked"<!-- ENDIF --> /></dd>*/
/* 		</dl>*/
/* 		<dl>*/
/* 			<dt><label for="field_show_on_ml">{L_DISPLAY_ON_MEMBERLIST}{L_COLON}</label><br /><span>{L_DISPLAY_ON_MEMBERLIST_EXPLAIN}</span></dt>*/
/* 			<dd><input type="checkbox" class="radio" id="field_show_on_ml" name="field_show_on_ml" value="1"<!-- IF S_SHOW_ON_MEMBERLIST --> checked="checked"<!-- ENDIF --> /></dd>*/
/* 		</dl>*/
/* 		<dl>*/
/* 			<dt><label for="field_required">{L_REQUIRED_FIELD}{L_COLON}</label><br /><span>{L_REQUIRED_FIELD_EXPLAIN}</span></dt>*/
/* 			<dd><input type="checkbox" class="radio" id="field_required" name="field_required" value="1"<!-- IF S_FIELD_REQUIRED --> checked="checked"<!-- ENDIF --> /></dd>*/
/* 		</dl>*/
/* 		<dl>*/
/* 			<dt><label for="field_show_novalue">{L_SHOW_NOVALUE_FIELD}{L_COLON}</label><br /><span>{L_SHOW_NOVALUE_FIELD_EXPLAIN}</span></dt>*/
/* 			<dd><input type="checkbox" class="radio" id="field_show_novalue" name="field_show_novalue" value="1"<!-- IF S_FIELD_SHOW_NOVALUE --> checked="checked"<!-- ENDIF --> /></dd>*/
/* 		</dl>*/
/* 		<dl>*/
/* 			<dt><label for="field_hide">{L_HIDE_PROFILE_FIELD}{L_COLON}</label><br /><span>{L_HIDE_PROFILE_FIELD_EXPLAIN}</span></dt>*/
/* 			<dd><input type="checkbox" class="radio" id="field_hide" name="field_hide" value="1"<!-- IF S_FIELD_HIDE --> checked="checked"<!-- ENDIF --> /></dd>*/
/* 		</dl>*/
/* 		<!-- EVENT acp_profile_contact_before -->*/
/* 		<dl>*/
/* 			<dt><label for="field_is_contact">{L_FIELD_IS_CONTACT}{L_COLON}</label><br /><span>{L_FIELD_IS_CONTACT_EXPLAIN}</span></dt>*/
/* 			<dd><input type="checkbox" class="radio" id="field_is_contact" name="field_is_contact" value="1"<!-- IF S_FIELD_CONTACT --> checked="checked"<!-- ENDIF --> /></dd>*/
/* 			<dd><input class="text medium" type="text" name="field_contact_desc" id="field_contact_desc" value="{FIELD_CONTACT_DESC}" /> <label for="field_contact_desc">{L_FIELD_CONTACT_DESC}</label></dd>*/
/* 			<dd><input class="text medium" type="text" name="field_contact_url" id="field_contact_url" value="{FIELD_CONTACT_URL}" /> <label for="field_contact_url">{L_FIELD_CONTACT_URL}</label></dd>*/
/* 		</dl>*/
/* 		</fieldset>*/
/* */
/* 		<!-- IF S_EDIT_MODE -->*/
/* 			<fieldset class="quick">*/
/* 				<input class="button1" type="submit" name="save" value="{L_SAVE}" />*/
/* 			</fieldset>*/
/* 		<!-- ENDIF -->*/
/* */
/* 		<fieldset>*/
/* 			<legend>{L_LANG_SPECIFIC}</legend>*/
/* 		<dl>*/
/* 			<dt><label for="lang_name">{L_USER_FIELD_NAME}{L_COLON}</label></dt>*/
/* 			<dd><input class="text medium" type="text" id="lang_name" name="lang_name" value="{LANG_NAME}" /></dd>*/
/* 		</dl>*/
/* 		<dl>*/
/* 			<dt><label for="lang_explain">{L_FIELD_DESCRIPTION}{L_COLON}</label><br /><span>{L_FIELD_DESCRIPTION_EXPLAIN}</span></dt>*/
/* 			<dd><textarea id="lang_explain" name="lang_explain" rows="3" cols="80">{LANG_EXPLAIN}</textarea></dd>*/
/* 		</dl>*/
/* 		<!-- IF S_TEXT or S_STRING -->*/
/* 			<dl>*/
/* 				<dt><label for="lang_default_value">{L_DEFAULT_VALUE}{L_COLON}</label><br /><span>{L_DEFAULT_VALUE_EXPLAIN}</span></dt>*/
/* 				<dd><!-- IF S_STRING --><input class="text medium" type="text" id="lang_default_value" name="lang_default_value" value="{LANG_DEFAULT_VALUE}" /><!-- ELSE --><textarea id="lang_default_value" name="lang_default_value" rows="5" cols="80">{LANG_DEFAULT_VALUE}</textarea><!-- ENDIF --></dd>*/
/* 			</dl>*/
/* 		<!-- ENDIF -->*/
/* 		<!-- IF S_BOOL or S_DROPDOWN -->*/
/* 			<dl>*/
/* 				<dt><label for="lang_options">{L_ENTRIES}{L_COLON}</label>*/
/* 					<!-- IF S_EDIT_MODE and S_DROPDOWN -->*/
/* 						<br /><span>{L_EDIT_DROPDOWN_LANG_EXPLAIN}</span>*/
/* 					<!-- ELSE -->*/
/* 						<br /><span>{L_LANG_OPTIONS_EXPLAIN}</span>*/
/* 					<!-- ENDIF -->*/
/* 				</dt>*/
/* 			<!-- IF S_DROPDOWN -->*/
/* 				<dd><textarea id="lang_options" name="lang_options" rows="5" cols="80">{LANG_OPTIONS}</textarea></dd>*/
/* 			<!-- ELSE -->*/
/* 				<dd><input class="medium" id="lang_options" name="lang_options[0]" value="{FIRST_LANG_OPTION}" /> {L_FIRST_OPTION}</dd>*/
/* 				<dd><input class="medium" name="lang_options[1]" value="{SECOND_LANG_OPTION}" /> {L_SECOND_OPTION}</dd>*/
/* 			<!-- ENDIF -->*/
/* 			</dl>*/
/* 		<!-- ENDIF -->*/
/* 		<!-- EVENT acp_profile_step_one_lang_after -->*/
/* 		</fieldset>*/
/* */
/* 		<fieldset class="quick">*/
/* 			{S_HIDDEN_FIELDS}*/
/* 			{S_FORM_TOKEN}*/
/* 			<input class="button1" type="submit" name="next" value="{L_PROFILE_TYPE_OPTIONS}" />*/
/* 		</fieldset>*/
/* */
/* 	<!-- ELSEIF S_STEP_TWO -->*/
/* */
/* 		<fieldset>*/
/* 			<legend>{L_TITLE}</legend>*/
/* 		<!-- BEGIN option -->*/
/* 			<dl>*/
/* 				<dt><label>{option.TITLE}{L_COLON}</label><!-- IF option.EXPLAIN --><br /><span>{option.EXPLAIN}</span><!-- ENDIF --></dt>*/
/* 				<dd>{option.FIELD}</dd>*/
/* 			</dl>*/
/* 		<!-- END option -->*/
/* 		</fieldset>*/
/* */
/* 		<fieldset class="quick" style="float: {S_CONTENT_FLOW_BEGIN};">*/
/* 			<input class="button1" type="submit" name="prev" value="{L_PROFILE_BASIC_OPTIONS}" />*/
/* 		</fieldset>*/
/* */
/* 		<fieldset class="quick" style="float: {S_CONTENT_FLOW_END};">*/
/* 			{S_HIDDEN_FIELDS}*/
/* 			{S_FORM_TOKEN}*/
/* 			<input class="button1" type="submit" name="next" value="{L_NEXT_STEP}" />*/
/* 		</fieldset>*/
/* */
/* 	<!-- ELSEIF S_STEP_THREE -->*/
/* */
/* 		<!-- BEGIN options -->*/
/* 			<fieldset>*/
/* 				<legend>{options.LANGUAGE}</legend>*/
/* 			<!-- BEGIN field -->*/
/* 				<dl>*/
/* 					<dt><label>{options.field.L_TITLE}{L_COLON}</label><!-- IF options.field.L_EXPLAIN --><br /><span>{options.field.L_EXPLAIN}</span><!-- ENDIF --></dt>*/
/* 					{options.field.FIELD}*/
/* 				</dl>*/
/* 			<!-- END field -->*/
/* 			</fieldset>*/
/* 		<!-- END options -->*/
/* */
/* 		<fieldset class="quick" style="float: {S_CONTENT_FLOW_BEGIN};">*/
/* 			<input class="button1" type="submit" name="prev" value="{L_PROFILE_TYPE_OPTIONS}" />*/
/* 		</fieldset>*/
/* */
/* 		<fieldset class="quick" style="float: {S_CONTENT_FLOW_END};">*/
/* 			{S_HIDDEN_FIELDS}*/
/* 			<input class="button1" type="submit" name="save" value="{L_SAVE}" />*/
/* 			{S_FORM_TOKEN}*/
/* 		</fieldset>*/
/* */
/* 	<!-- ENDIF -->*/
/* */
/* 	</form>*/
/* */
/* <!-- ELSE -->*/
/* */
/* 	<h1>{L_ACP_CUSTOM_PROFILE_FIELDS}</h1>*/
/* */
/* 	<!-- IF S_NEED_EDIT -->*/
/* 		<div class="errorbox">*/
/* 			<h3>{L_WARNING}</h3>*/
/* 			<p>{L_CUSTOM_FIELDS_NOT_TRANSLATED}</p>*/
/* 		</div>*/
/* 	<!-- ENDIF -->*/
/* */
/* 	<table class="table1 zebra-table">*/
/* 	<thead>*/
/* 	<tr>*/
/* 		<th>{L_FIELD_IDENT}</th>*/
/* 		<th>{L_FIELD_TYPE}</th>*/
/* 		<th colspan="2">{L_OPTIONS}</th>*/
/* 	</tr>*/
/* 	</thead>*/
/* 	<tbody>*/
/* 	<!-- BEGIN fields -->*/
/* 	<tr>*/
/* 		<td>{fields.FIELD_IDENT}</td>*/
/* 		<td>{fields.FIELD_TYPE}</td>*/
/* 		<td style="text-align: center;"><a href="{fields.U_ACTIVATE_DEACTIVATE}" data-ajax="activate_deactivate">{fields.L_ACTIVATE_DEACTIVATE}</a><!-- IF fields.S_NEED_EDIT --> | <a href="{fields.U_TRANSLATE}" style="color: red;">{L_TRANSLATE}</a><!-- ENDIF --></td>*/
/* */
/* 		<td class="actions" style="width: 80px;">*/
/* 			<span class="up-disabled" style="display:none;">{ICON_MOVE_UP_DISABLED}</span>*/
/* 			<span class="up"><a href="{fields.U_MOVE_UP}" data-ajax="row_up">{ICON_MOVE_UP}</a></span>*/
/* 			<span class="down-disabled" style="display:none;">{ICON_MOVE_DOWN_DISABLED}</span>*/
/* 			<span class="down"><a href="{fields.U_MOVE_DOWN}" data-ajax="row_down">{ICON_MOVE_DOWN}</a></span>*/
/* 			<!-- IF not fields.S_NEED_EDIT -->*/
/* 				<a href="{fields.U_EDIT}">{ICON_EDIT}</a>*/
/* 			<!-- ELSE -->*/
/* 				{ICON_EDIT_DISABLED}*/
/* 			<!-- ENDIF -->*/
/* 			<a href="{fields.U_DELETE}" data-ajax="row_delete">{ICON_DELETE}</a>*/
/* 		</td>*/
/* */
/* 	</tr>*/
/* 	<!-- BEGINELSE -->*/
/* 	<tr class="row3">*/
/* 		<td colspan="4">{L_ACP_NO_ITEMS}</td>*/
/* 	</tr>*/
/* 	<!-- END fields -->*/
/* 	</tbody>*/
/* 	</table>*/
/* */
/* 	<form id="profile_fields" method="post" action="{U_ACTION}">*/
/* */
/* 	<fieldset class="quick">*/
/* 		<input class="text small" type="text" name="field_ident" /> <select name="field_type">{S_TYPE_OPTIONS}</select>*/
/* 		<input class="button1" type="submit" name="submit" value="{L_CREATE_NEW_FIELD}" />*/
/* 		<input type="hidden" name="create" value="1" />*/
/* 		{S_FORM_TOKEN}*/
/* 	</fieldset>*/
/* 	</form>*/
/* */
/* <!-- ENDIF -->*/
/* */
/* <!-- INCLUDE overall_footer.html -->*/
/* */
