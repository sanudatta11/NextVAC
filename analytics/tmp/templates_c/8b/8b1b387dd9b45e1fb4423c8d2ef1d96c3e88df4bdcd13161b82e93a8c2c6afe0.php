<?php

/* @Goals/_listGoalEdit.twig */
class __TwigTemplate_b9fd0b4aec4b1e5d03ee5b588de852496312812d7bb77f6d07eb0a975c3f76ee extends Twig_Template
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
        echo "<div id='entityEditContainer' feature=\"true\"
     ng-show=\"manageGoals.showGoalList\"
     piwik-content-block content-title=\"";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ManageGoals")), "html_attr");
        echo "\"
     class=\"managegoals\">

    <div piwik-activity-indicator loading=\"manageGoals.isLoading\"></div>

    <div class=\"contentHelp\">
        ";
        // line 9
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LearnMoreAboutGoalTrackingDocumentation", "<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/tracking-goals-web-analytics/' target='_blank'>", "</a>"));
        echo "

        ";
        // line 11
        if ( !($context["ecommerceEnabled"] ?? $this->getContext($context, "ecommerceEnabled"))) {
            // line 12
            echo "            <br /><br/>
            ";
            // line 13
            ob_start();
            // line 14
            echo "                <a href='";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "SitesManager", "action" => "index"))), "html", null, true);
            echo "'>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_WebsitesManagement")), "html", null, true);
            echo "</a>
            ";
            $context["websiteManageText"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 16
            echo "            ";
            ob_start();
            // line 17
            echo "                <a href=\"http://piwik.org/docs/ecommerce-analytics/\" rel=\"noreferrer\" target=\"_blank\">";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_EcommerceReports")), "html", null, true);
            echo "</a>
            ";
            $context["ecommerceReportText"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 19
            echo "            ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Optional")), "html", null, true);
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Ecommerce")), "html", null, true);
            echo ": ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_YouCanEnableEcommerceReports", ($context["ecommerceReportText"] ?? $this->getContext($context, "ecommerceReportText")), ($context["websiteManageText"] ?? $this->getContext($context, "websiteManageText"))));
            echo "
        ";
        }
        // line 21
        echo "    </div>

    <table piwik-content-table>
        <thead>
        <tr>
            <th class=\"first\">Id</th>
            <th>";
        // line 27
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_GoalName")), "html", null, true);
        echo "</th>
            <th>";
        // line 28
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Description")), "html", null, true);
        echo "</th>
            <th>";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_GoalIsTriggeredWhen")), "html", null, true);
        echo "</th>
            <th>";
        // line 30
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
        echo "</th>
            ";
        // line 31
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.beforeGoalListActionsHead"));
        echo "
            ";
        // line 32
        if (($context["userCanEditGoals"] ?? $this->getContext($context, "userCanEditGoals"))) {
            // line 33
            echo "                <th>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Edit")), "html", null, true);
            echo "</th>
                <th>";
            // line 34
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Delete")), "html", null, true);
            echo "</th>
            ";
        }
        // line 36
        echo "        </tr>
        </thead>
        ";
        // line 38
        if (twig_test_empty(($context["goals"] ?? $this->getContext($context, "goals")))) {
            // line 39
            echo "            <tr>
                <td colspan='8'>
                    <br/>
                    ";
            // line 42
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ThereIsNoGoalToManage", ($context["siteName"] ?? $this->getContext($context, "siteName"))));
            echo ".
                    <br/><br/>
                </td>
            </tr>
        ";
        } else {
            // line 47
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["goals"] ?? $this->getContext($context, "goals")));
            foreach ($context['_seq'] as $context["_key"] => $context["goal"]) {
                // line 48
                echo "                <tr id=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["goal"], "idgoal", array()), "html", null, true);
                echo "\">
                    <td class=\"first\">";
                // line 49
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["goal"], "idgoal", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 50
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["goal"], "name", array()), "html", null, true);
                echo "</td>
                    <td>";
                // line 51
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["goal"], "description", array()), "html", null, true);
                echo "</td>
                    <td><span class='matchAttribute'>";
                // line 52
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["goal"], "match_attribute", array()), "html", null, true);
                echo "</span>
                        ";
                // line 53
                if ($this->getAttribute($context["goal"], "pattern_type", array(), "any", true, true)) {
                    // line 54
                    echo "                            <br/>
                            ";
                    // line 55
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Pattern")), "html", null, true);
                    echo " ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["goal"], "pattern_type", array()), "html", null, true);
                    echo ": ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["goal"], "pattern", array()), "html", null, true);
                    echo "
                        ";
                }
                // line 57
                echo "                    </td>
                    <td class=\"center\">
                        ";
                // line 59
                if (($this->getAttribute($context["goal"], "revenue", array()) == 0)) {
                    echo "-";
                } else {
                    echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["goal"], "revenue", array()), ($context["idSite"] ?? $this->getContext($context, "idSite"))));
                }
                // line 60
                echo "                    </td>
                    ";
                // line 61
                echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.beforeGoalListActionsBody", $context["goal"]));
                echo "
                    ";
                // line 62
                if (($context["userCanEditGoals"] ?? $this->getContext($context, "userCanEditGoals"))) {
                    // line 63
                    echo "                        <td style=\"padding-top:2px\">
                            <button ng-click=\"manageGoals.editGoal(";
                    // line 64
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["goal"], "idgoal", array()), "html", null, true);
                    echo ")\" class=\"table-action\" title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Edit")), "html", null, true);
                    echo "\">
                                <span class=\"icon-edit\"></span>
                            </button>
                        </td>
                        <td style=\"padding-top:2px\">
                            <button ng-click=\"manageGoals.deleteGoal(";
                    // line 69
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["goal"], "idgoal", array()), "html", null, true);
                    echo ")\" class=\"table-action\" title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Delete")), "html", null, true);
                    echo "\">
                                <span class=\"icon-delete\"></span>
                            </button>
                        </td>
                    ";
                }
                // line 74
                echo "                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['goal'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "        ";
        }
        // line 77
        echo "    </table>

    ";
        // line 79
        if ((($context["userCanEditGoals"] ?? $this->getContext($context, "userCanEditGoals")) &&  !array_key_exists("onlyShowAddNewGoal", $context))) {
            // line 80
            echo "        <div class=\"tableActionBar\">
            <button id=\"add-goal\" ng-click=\"manageGoals.createGoal()\">
                <span class=\"icon-add\"></span>
                ";
            // line 83
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AddNewGoal")), "html", null, true);
            echo "
            </button>
        </div>
    ";
        }
        // line 87
        echo "
</div>

<div class=\"ui-confirm\" id=\"confirm\">
    <h2></h2>
    <input role=\"yes\" type=\"button\" value=\"";
        // line 92
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "\"/>
    <input role=\"no\" type=\"button\" value=\"";
        // line 93
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
        echo "\"/>
</div>

<script type=\"text/javascript\">
    var goalTypeToTranslation = {
        \"manually\": \"";
        // line 98
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ManuallyTriggeredUsingJavascriptFunction")), "html", null, true);
        echo "\",
        \"file\": \"";
        // line 99
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Download")), "html", null, true);
        echo "\",
        \"url\": \"";
        // line 100
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_VisitUrl")), "html", null, true);
        echo "\",
        \"title\": \"";
        // line 101
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_VisitPageTitle")), "html", null, true);
        echo "\",
        \"external_website\": \"";
        // line 102
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ClickOutlink")), "html", null, true);
        echo "\",
        \"event_action\": \"";
        // line 103
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_SendEvent")), "html", null, true);
        echo " (";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_EventAction")), "html", null, true);
        echo ")\",
        \"event_category\": \"";
        // line 104
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_SendEvent")), "html", null, true);
        echo " (";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_EventCategory")), "html", null, true);
        echo ")\",
        \"event_name\": \"";
        // line 105
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_SendEvent")), "html", null, true);
        echo " (";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_EventName")), "html", null, true);
        echo ")\"
    };

    \$(document).ready(function () {
        // translation of the goal \"match attribute\" to human readable description
        \$('.matchAttribute').each(function () {
            var matchAttribute = \$(this).text();
            var translation = goalTypeToTranslation[matchAttribute];
            \$(this).text(translation);
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "@Goals/_listGoalEdit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  291 => 105,  285 => 104,  279 => 103,  275 => 102,  271 => 101,  267 => 100,  263 => 99,  259 => 98,  251 => 93,  247 => 92,  240 => 87,  233 => 83,  228 => 80,  226 => 79,  222 => 77,  219 => 76,  212 => 74,  202 => 69,  192 => 64,  189 => 63,  187 => 62,  183 => 61,  180 => 60,  174 => 59,  170 => 57,  161 => 55,  158 => 54,  156 => 53,  152 => 52,  148 => 51,  144 => 50,  140 => 49,  135 => 48,  130 => 47,  122 => 42,  117 => 39,  115 => 38,  111 => 36,  106 => 34,  101 => 33,  99 => 32,  95 => 31,  91 => 30,  87 => 29,  83 => 28,  79 => 27,  71 => 21,  61 => 19,  55 => 17,  52 => 16,  44 => 14,  42 => 13,  39 => 12,  37 => 11,  32 => 9,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id='entityEditContainer' feature=\"true\"
     ng-show=\"manageGoals.showGoalList\"
     piwik-content-block content-title=\"{{ 'Goals_ManageGoals'|translate|e('html_attr') }}\"
     class=\"managegoals\">

    <div piwik-activity-indicator loading=\"manageGoals.isLoading\"></div>

    <div class=\"contentHelp\">
        {{ 'Goals_LearnMoreAboutGoalTrackingDocumentation'|translate(\"<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/tracking-goals-web-analytics/' target='_blank'>\",\"</a>\")|raw }}

        {% if not ecommerceEnabled %}
            <br /><br/>
            {% set websiteManageText %}
                <a href='{{ linkTo({'module':'SitesManager','action':'index' }) }}'>{{ 'SitesManager_WebsitesManagement'|translate }}</a>
            {% endset %}
            {% set ecommerceReportText %}
                <a href=\"http://piwik.org/docs/ecommerce-analytics/\" rel=\"noreferrer\" target=\"_blank\">{{ 'Goals_EcommerceReports'|translate }}</a>
            {% endset %}
            {{ 'Goals_Optional'|translate }} {{ 'Goals_Ecommerce'|translate }}: {{ 'Goals_YouCanEnableEcommerceReports'|translate(ecommerceReportText,websiteManageText)|raw }}
        {% endif %}
    </div>

    <table piwik-content-table>
        <thead>
        <tr>
            <th class=\"first\">Id</th>
            <th>{{ 'Goals_GoalName'|translate }}</th>
            <th>{{ 'General_Description'|translate }}</th>
            <th>{{ 'Goals_GoalIsTriggeredWhen'|translate }}</th>
            <th>{{ 'General_ColumnRevenue'|translate }}</th>
            {{ postEvent(\"Template.beforeGoalListActionsHead\") }}
            {% if userCanEditGoals %}
                <th>{{ 'General_Edit'|translate }}</th>
                <th>{{ 'General_Delete'|translate }}</th>
            {% endif %}
        </tr>
        </thead>
        {% if goals is empty %}
            <tr>
                <td colspan='8'>
                    <br/>
                    {{ 'Goals_ThereIsNoGoalToManage'|translate(siteName)|raw }}.
                    <br/><br/>
                </td>
            </tr>
        {% else %}
            {% for goal in goals %}
                <tr id=\"{{ goal.idgoal }}\">
                    <td class=\"first\">{{ goal.idgoal }}</td>
                    <td>{{ goal.name }}</td>
                    <td>{{ goal.description }}</td>
                    <td><span class='matchAttribute'>{{ goal.match_attribute }}</span>
                        {% if goal.pattern_type is defined %}
                            <br/>
                            {{ 'Goals_Pattern'|translate }} {{ goal.pattern_type }}: {{ goal.pattern }}
                        {% endif %}
                    </td>
                    <td class=\"center\">
                        {% if goal.revenue==0 %}-{% else %}{{ goal.revenue|money(idSite)|raw }}{% endif %}
                    </td>
                    {{ postEvent(\"Template.beforeGoalListActionsBody\", goal) }}
                    {% if userCanEditGoals %}
                        <td style=\"padding-top:2px\">
                            <button ng-click=\"manageGoals.editGoal({{ goal.idgoal }})\" class=\"table-action\" title=\"{{ 'General_Edit'|translate }}\">
                                <span class=\"icon-edit\"></span>
                            </button>
                        </td>
                        <td style=\"padding-top:2px\">
                            <button ng-click=\"manageGoals.deleteGoal({{ goal.idgoal }})\" class=\"table-action\" title=\"{{ 'General_Delete'|translate }}\">
                                <span class=\"icon-delete\"></span>
                            </button>
                        </td>
                    {% endif %}
                </tr>
            {% endfor %}
        {% endif %}
    </table>

    {% if userCanEditGoals and onlyShowAddNewGoal is not defined %}
        <div class=\"tableActionBar\">
            <button id=\"add-goal\" ng-click=\"manageGoals.createGoal()\">
                <span class=\"icon-add\"></span>
                {{ 'Goals_AddNewGoal'|translate }}
            </button>
        </div>
    {% endif %}

</div>

<div class=\"ui-confirm\" id=\"confirm\">
    <h2></h2>
    <input role=\"yes\" type=\"button\" value=\"{{ 'General_Yes'|translate }}\"/>
    <input role=\"no\" type=\"button\" value=\"{{ 'General_No'|translate }}\"/>
</div>

<script type=\"text/javascript\">
    var goalTypeToTranslation = {
        \"manually\": \"{{ 'Goals_ManuallyTriggeredUsingJavascriptFunction'|translate }}\",
        \"file\": \"{{ 'Goals_Download'|translate }}\",
        \"url\": \"{{ 'Goals_VisitUrl'|translate }}\",
        \"title\": \"{{ 'Goals_VisitPageTitle'|translate }}\",
        \"external_website\": \"{{ 'Goals_ClickOutlink'|translate }}\",
        \"event_action\": \"{{ 'Goals_SendEvent'|translate }} ({{ 'Events_EventAction'|translate }})\",
        \"event_category\": \"{{ 'Goals_SendEvent'|translate }} ({{ 'Events_EventCategory'|translate }})\",
        \"event_name\": \"{{ 'Goals_SendEvent'|translate }} ({{ 'Events_EventName'|translate }})\"
    };

    \$(document).ready(function () {
        // translation of the goal \"match attribute\" to human readable description
        \$('.matchAttribute').each(function () {
            var matchAttribute = \$(this).text();
            var translation = goalTypeToTranslation[matchAttribute];
            \$(this).text(translation);
        });
    });
</script>
", "@Goals/_listGoalEdit.twig", "/var/www/html/analytics/plugins/Goals/templates/_listGoalEdit.twig");
    }
}
