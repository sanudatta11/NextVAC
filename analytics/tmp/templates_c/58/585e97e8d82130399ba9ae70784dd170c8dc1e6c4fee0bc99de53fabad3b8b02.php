<?php

/* @Goals/_formAddGoal.twig */
class __TwigTemplate_245bfb645c2258bb6b2f3b73deef2a10f4f6e6ec5b2f5ee7c1876ac1755382a8 extends Twig_Template
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
        echo "<div piwik-content-block
     content-title=\"";
        // line 2
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AddNewGoal")), "html_attr");
        echo "\"
     class=\"addEditGoal\"
     ng-show=\"manageGoals.showEditGoal\">

    ";
        // line 6
        if ((array_key_exists("addNewGoalIntro", $context) && ($context["addNewGoalIntro"] ?? $this->getContext($context, "addNewGoalIntro")))) {
            // line 7
            echo "        ";
            echo ($context["addNewGoalIntro"] ?? $this->getContext($context, "addNewGoalIntro"));
            echo "
    ";
        }
        // line 9
        echo "
    <div piwik-form>
        <div piwik-field uicontrol=\"text\" name=\"goal_name\"
             ng-model=\"manageGoals.goal.name\"
             maxlength=\"50\"
             title=\"";
        // line 14
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_GoalName")), "html_attr");
        echo "\">
        </div>

        <div piwik-field uicontrol=\"text\" name=\"goal_description\"
             ng-model=\"manageGoals.goal.description\"
             maxlength=\"255\"
             title=\"";
        // line 20
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Description")), "html_attr");
        echo "\">
        </div>

        <div class=\"row goalIsTriggeredWhen\">
            <div class=\"col s12\">
                <h3>";
        // line 25
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_GoalIsTriggered")), "html_attr");
        echo "</h3>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col s12 m6 goalTriggerType\">
                <div piwik-field uicontrol=\"select\" name=\"trigger_type\"
                     ng-model=\"manageGoals.goal.triggerType\"
                     ng-change=\"manageGoals.changedTriggerType()\"
                     full-width=\"true\"
                     options=\"";
        // line 35
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["goalTriggerTypeOptions"] ?? $this->getContext($context, "goalTriggerTypeOptions"))), "html", null, true);
        echo "\">
                </div>
            </div>
            <div class=\"col s12 m6\">
                <div piwik-alert=\"info\" ng-show=\"manageGoals.goal.triggerType == 'manually'\">
                    ";
        // line 40
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_WhereVisitedPageManuallyCallsJavascriptTrackerLearnMore", "<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/javascript-tracking/%23toc-manually-trigger-a-conversion-for-a-goal'>", "</a>"));
        echo "
                </div>

                <div piwik-field uicontrol=\"radio\" name=\"match_attribute\"
                     ng-show=\"manageGoals.goal.triggerType != 'manually'\"
                     full-width=\"true\"
                     ng-model=\"manageGoals.goal.matchAttribute\"
                     options=\"";
        // line 47
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["goalMatchAttributeOptions"] ?? $this->getContext($context, "goalMatchAttributeOptions"))), "html", null, true);
        echo "\">
                </div>
            </div>
        </div>

        <div class=\"row whereTheMatchAttrbiute\" ng-show=\"manageGoals.goal.triggerType != 'manually'\">
            <h3 class=\"col s12\">";
        // line 53
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_WhereThe")), "html_attr");
        echo "
                <span ng-show=\"manageGoals.goal.matchAttribute == 'url'\">
                    ";
        // line 55
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_URL")), "html", null, true);
        echo "
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'title'\">
                    ";
        // line 58
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_PageTitle")), "html", null, true);
        echo "
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'file'\">
                    ";
        // line 61
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Filename")), "html", null, true);
        echo "
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'external_website'\">
                    ";
        // line 64
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ExternalWebsiteUrl")), "html", null, true);
        echo "
                </span>
            </h3>
        </div>

        <div class=\"row\" ng-show=\"manageGoals.goal.triggerType != 'manually'\">
            <div class=\"col s12 m6 l4\"
                 ng-show=\"manageGoals.goal.matchAttribute == 'event'\">
                <div piwik-field uicontrol=\"select\" name=\"event_type\"
                     ng-model=\"manageGoals.goal.eventType\"
                     full-width=\"true\"
                     options=\"";
        // line 75
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["eventTypeOptions"] ?? $this->getContext($context, "eventTypeOptions"))), "html", null, true);
        echo "\">
                </div>
            </div>

            <div class=\"col s12 m6 l4\">
                <div piwik-field uicontrol=\"select\" name=\"pattern_type\"
                     ng-model=\"manageGoals.goal.patternType\"
                     full-width=\"true\"
                     options=\"";
        // line 83
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["patternTypeOptions"] ?? $this->getContext($context, "patternTypeOptions"))), "html", null, true);
        echo "\">
                </div>
            </div>

            <div class=\"col s12 m6 l4\">
                <div piwik-field uicontrol=\"text\" name=\"pattern\"
                     ng-model=\"manageGoals.goal.pattern\"
                     maxlength=\"255\"
                     title=\"";
        // line 91
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Pattern")), "html_attr");
        echo "\"
                     full-width=\"true\">
                </div>
            </div>

            <div id=\"examples_pattern\" class=\"col s12\" piwik-alert=\"info\">
                <span ng-show=\"manageGoals.goal.matchAttribute == 'url'\">
                    ";
        // line 98
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "'checkout/confirmation'")), "html", null, true);
        echo "
                    <br />";
        // line 99
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_IsExactly", "'http://example.com/thank-you.html'")), "html", null, true);
        echo "
                    <br />";
        // line 100
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_MatchesExpression", "'(.*)\\/demo\\/(.*)'")), "html", null, true);
        echo "
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'title'\">
                    ";
        // line 103
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "'Order confirmation'")), "html", null, true);
        echo "
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'file'\">
                    ";
        // line 106
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "'files/brochure.pdf'")), "html", null, true);
        echo "
                   <br />";
        // line 107
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_IsExactly", "'http://example.com/files/brochure.pdf'")), "html", null, true);
        echo "
                   <br />";
        // line 108
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_MatchesExpression", "'(.*)\\.zip'")), "html", null, true);
        echo "
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'external_website'\">
                    ";
        // line 111
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "'amazon.com'")), "html", null, true);
        echo "
                   <br />";
        // line 112
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_IsExactly", "'http://mypartner.com/landing.html'")), "html", null, true);
        echo "
                   <br />";
        // line 113
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_MatchesExpression", "'http://www.amazon.com\\/(.*)\\/yourAffiliateId'")), "html", null, true);
        echo "
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'event'\">
                    ";
        // line 116
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "'video'")), "html", null, true);
        echo "
                   <br />";
        // line 117
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_IsExactly", "'click'")), "html", null, true);
        echo "
                   <br />";
        // line 118
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_MatchesExpression", "'(.*)_banner'")), "html", null, true);
        echo "\"
                </span>
            </div>
        </div>

        <div piwik-field uicontrol=\"checkbox\" name=\"case_sensitive\"
             ng-model=\"manageGoals.goal.caseSensitive\"
             ng-show=\"manageGoals.goal.triggerType != 'manually'\"
             title=\"";
        // line 126
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_CaseSensitive")), "html_attr");
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Optional")), "html_attr");
        echo "\">
        </div>

        <div piwik-field uicontrol=\"radio\" name=\"allow_multiple\"
             ng-model=\"manageGoals.goal.allowMultiple\"
             options=\"";
        // line 131
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["allowMultipleOptions"] ?? $this->getContext($context, "allowMultipleOptions"))), "html", null, true);
        echo "\"
             introduction=\"";
        // line 132
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AllowMultipleConversionsPerVisit")), "html_attr");
        echo "\"
             inline-help=\"";
        // line 133
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_HelpOneConversionPerVisit")), "html_attr");
        echo "\">
        </div>

        <div piwik-field uicontrol=\"text\" name=\"revenue\"
             ng-model=\"manageGoals.goal.revenue\"
             introduction=\"";
        // line 138
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_DefaultRevenue")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Optional")), "html", null, true);
        echo "\"
             inline-help=\"";
        // line 139
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_DefaultRevenueHelp")), "html_attr");
        echo "\">
        </div>

        ";
        // line 142
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.endGoalEditTable"));
        echo "

        <input type=\"hidden\" name=\"goalIdUpdate\" value=\"\"/>
        <div piwik-save-button
             saving=\"manageGoals.isLoading\"
             onconfirm=\"manageGoals.save()\"
             ng-value=\"manageGoals.goal.submitText\"></div>

        ";
        // line 150
        if ( !array_key_exists("onlyShowAddNewGoal", $context)) {
            // line 151
            echo "            <div class='entityCancel' ng-show=\"manageGoals.showEditGoal\" ng-click=\"manageGoals.showListOfReports()\">
                ";
            // line 152
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OrCancel", "<a class='entityCancelLink'>", "</a>"));
            echo "
            </div>
        ";
        }
        // line 155
        echo "    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@Goals/_formAddGoal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  323 => 155,  317 => 152,  314 => 151,  312 => 150,  301 => 142,  295 => 139,  289 => 138,  281 => 133,  277 => 132,  273 => 131,  263 => 126,  250 => 118,  244 => 117,  238 => 116,  230 => 113,  224 => 112,  218 => 111,  210 => 108,  204 => 107,  198 => 106,  190 => 103,  182 => 100,  176 => 99,  170 => 98,  160 => 91,  149 => 83,  138 => 75,  124 => 64,  118 => 61,  112 => 58,  106 => 55,  101 => 53,  92 => 47,  82 => 40,  74 => 35,  61 => 25,  53 => 20,  44 => 14,  37 => 9,  31 => 7,  29 => 6,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div piwik-content-block
     content-title=\"{{ 'Goals_AddNewGoal'|translate|e('html_attr') }}\"
     class=\"addEditGoal\"
     ng-show=\"manageGoals.showEditGoal\">

    {% if addNewGoalIntro is defined and addNewGoalIntro %}
        {{ addNewGoalIntro|raw }}
    {% endif %}

    <div piwik-form>
        <div piwik-field uicontrol=\"text\" name=\"goal_name\"
             ng-model=\"manageGoals.goal.name\"
             maxlength=\"50\"
             title=\"{{ 'Goals_GoalName'|translate|e('html_attr') }}\">
        </div>

        <div piwik-field uicontrol=\"text\" name=\"goal_description\"
             ng-model=\"manageGoals.goal.description\"
             maxlength=\"255\"
             title=\"{{ 'General_Description'|translate|e('html_attr') }}\">
        </div>

        <div class=\"row goalIsTriggeredWhen\">
            <div class=\"col s12\">
                <h3>{{ 'Goals_GoalIsTriggered'|translate|e('html_attr') }}</h3>
            </div>
        </div>

        <div class=\"row\">
            <div class=\"col s12 m6 goalTriggerType\">
                <div piwik-field uicontrol=\"select\" name=\"trigger_type\"
                     ng-model=\"manageGoals.goal.triggerType\"
                     ng-change=\"manageGoals.changedTriggerType()\"
                     full-width=\"true\"
                     options=\"{{ goalTriggerTypeOptions|json_encode }}\">
                </div>
            </div>
            <div class=\"col s12 m6\">
                <div piwik-alert=\"info\" ng-show=\"manageGoals.goal.triggerType == 'manually'\">
                    {{ 'Goals_WhereVisitedPageManuallyCallsJavascriptTrackerLearnMore'|translate(\"<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/javascript-tracking/%23toc-manually-trigger-a-conversion-for-a-goal'>\",\"</a>\")|raw }}
                </div>

                <div piwik-field uicontrol=\"radio\" name=\"match_attribute\"
                     ng-show=\"manageGoals.goal.triggerType != 'manually'\"
                     full-width=\"true\"
                     ng-model=\"manageGoals.goal.matchAttribute\"
                     options=\"{{ goalMatchAttributeOptions|json_encode }}\">
                </div>
            </div>
        </div>

        <div class=\"row whereTheMatchAttrbiute\" ng-show=\"manageGoals.goal.triggerType != 'manually'\">
            <h3 class=\"col s12\">{{ 'Goals_WhereThe'|translate|e('html_attr') }}
                <span ng-show=\"manageGoals.goal.matchAttribute == 'url'\">
                    {{ 'Goals_URL'|translate }}
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'title'\">
                    {{ 'Goals_PageTitle'|translate }}
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'file'\">
                    {{ 'Goals_Filename'|translate }}
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'external_website'\">
                    {{ 'Goals_ExternalWebsiteUrl'|translate }}
                </span>
            </h3>
        </div>

        <div class=\"row\" ng-show=\"manageGoals.goal.triggerType != 'manually'\">
            <div class=\"col s12 m6 l4\"
                 ng-show=\"manageGoals.goal.matchAttribute == 'event'\">
                <div piwik-field uicontrol=\"select\" name=\"event_type\"
                     ng-model=\"manageGoals.goal.eventType\"
                     full-width=\"true\"
                     options=\"{{ eventTypeOptions|json_encode }}\">
                </div>
            </div>

            <div class=\"col s12 m6 l4\">
                <div piwik-field uicontrol=\"select\" name=\"pattern_type\"
                     ng-model=\"manageGoals.goal.patternType\"
                     full-width=\"true\"
                     options=\"{{ patternTypeOptions|json_encode }}\">
                </div>
            </div>

            <div class=\"col s12 m6 l4\">
                <div piwik-field uicontrol=\"text\" name=\"pattern\"
                     ng-model=\"manageGoals.goal.pattern\"
                     maxlength=\"255\"
                     title=\"{{ 'Goals_Pattern'|translate|e('html_attr') }}\"
                     full-width=\"true\">
                </div>
            </div>

            <div id=\"examples_pattern\" class=\"col s12\" piwik-alert=\"info\">
                <span ng-show=\"manageGoals.goal.matchAttribute == 'url'\">
                    {{ 'General_ForExampleShort'|translate }} {{ 'Goals_Contains'|translate(\"'checkout/confirmation'\") }}
                    <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_IsExactly'|translate(\"'http://example.com/thank-you.html'\") }}
                    <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_MatchesExpression'|translate(\"'(.*)\\\\\\/demo\\\\\\/(.*)'\") }}
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'title'\">
                    {{ 'General_ForExampleShort'|translate }} {{ 'Goals_Contains'|translate(\"'Order confirmation'\") }}
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'file'\">
                    {{ 'General_ForExampleShort'|translate }} {{ 'Goals_Contains'|translate(\"'files/brochure.pdf'\") }}
                   <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_IsExactly'|translate(\"'http://example.com/files/brochure.pdf'\") }}
                   <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_MatchesExpression'|translate(\"'(.*)\\\\\\.zip'\") }}
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'external_website'\">
                    {{ 'General_ForExampleShort'|translate }} {{ 'Goals_Contains'|translate(\"'amazon.com'\") }}
                   <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_IsExactly'|translate(\"'http://mypartner.com/landing.html'\") }}
                   <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_MatchesExpression'|translate(\"'http://www.amazon.com\\\\\\/(.*)\\\\\\/yourAffiliateId'\") }}
                </span>
               <span ng-show=\"manageGoals.goal.matchAttribute == 'event'\">
                    {{ 'General_ForExampleShort'|translate }} {{ 'Goals_Contains'|translate(\"'video'\") }}
                   <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_IsExactly'|translate(\"'click'\") }}
                   <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_MatchesExpression'|translate(\"'(.*)_banner'\") }}\"
                </span>
            </div>
        </div>

        <div piwik-field uicontrol=\"checkbox\" name=\"case_sensitive\"
             ng-model=\"manageGoals.goal.caseSensitive\"
             ng-show=\"manageGoals.goal.triggerType != 'manually'\"
             title=\"{{ 'Goals_CaseSensitive'|translate|e('html_attr') }} {{ 'Goals_Optional'|translate|e('html_attr') }}\">
        </div>

        <div piwik-field uicontrol=\"radio\" name=\"allow_multiple\"
             ng-model=\"manageGoals.goal.allowMultiple\"
             options=\"{{ allowMultipleOptions|json_encode }}\"
             introduction=\"{{ 'Goals_AllowMultipleConversionsPerVisit'|translate|e('html_attr') }}\"
             inline-help=\"{{ 'Goals_HelpOneConversionPerVisit'|translate|e('html_attr') }}\">
        </div>

        <div piwik-field uicontrol=\"text\" name=\"revenue\"
             ng-model=\"manageGoals.goal.revenue\"
             introduction=\"{{ 'Goals_DefaultRevenue'|translate }} {{ 'Goals_Optional'|translate }}\"
             inline-help=\"{{ 'Goals_DefaultRevenueHelp'|translate|e('html_attr') }}\">
        </div>

        {{ postEvent(\"Template.endGoalEditTable\") }}

        <input type=\"hidden\" name=\"goalIdUpdate\" value=\"\"/>
        <div piwik-save-button
             saving=\"manageGoals.isLoading\"
             onconfirm=\"manageGoals.save()\"
             ng-value=\"manageGoals.goal.submitText\"></div>

        {% if onlyShowAddNewGoal is not defined %}
            <div class='entityCancel' ng-show=\"manageGoals.showEditGoal\" ng-click=\"manageGoals.showListOfReports()\">
                {{ 'General_OrCancel'|translate(\"<a class='entityCancelLink'>\",\"</a>\")|raw }}
            </div>
        {% endif %}
    </div>

</div>
", "@Goals/_formAddGoal.twig", "/var/www/html/analytics/plugins/Goals/templates/_formAddGoal.twig");
    }
}
