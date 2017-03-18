<?php

/* @Goals/addNewGoal.twig */
class __TwigTemplate_17d91ee4bacfc862643ea9a82ef0f0592ec1a006177a24b540bb5d6b8e58a8cd extends Twig_Template
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
        if (($context["userCanEditGoals"] ?? $this->getContext($context, "userCanEditGoals"))) {
            // line 2
            echo "    ";
            ob_start();
            // line 3
            echo "        <p>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_NewGoalIntro")), "html", null, true);
            echo "</p>
        <p>";
            // line 4
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LearnMoreAboutGoalTrackingDocumentation", "<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/tracking-goals-web-analytics/' target='_blank'>", "</a>"));
            echo "</p>
    ";
            $context["addNewGoalIntro"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 6
            echo "
    ";
            // line 7
            $this->loadTemplate("@Goals/_addEditGoal.twig", "@Goals/addNewGoal.twig", 7)->display($context);
            // line 8
            echo "
    <br/><br/>

";
        } else {
            // line 12
            echo "    <div piwik-content-block content-title=\"";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AddNewGoal")), "html_attr");
            echo "\">
        <p>
            ";
            // line 14
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_NoGoalsNeedAccess"));
            echo "
        </p>
        <p>
            ";
            // line 17
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LearnMoreAboutGoalTrackingDocumentation", "<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/tracking-goals-web-analytics/' target='_blank'>", "</a>"));
            echo "
        </p>
    </div>
    ";
            // line 20
            echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.afterGoalCannotAddNewGoal"));
            echo "

";
        }
    }

    public function getTemplateName()
    {
        return "@Goals/addNewGoal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 20,  57 => 17,  51 => 14,  45 => 12,  39 => 8,  37 => 7,  34 => 6,  29 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if userCanEditGoals %}
    {% set addNewGoalIntro %}
        <p>{{ 'Goals_NewGoalIntro'|translate }}</p>
        <p>{{ 'Goals_LearnMoreAboutGoalTrackingDocumentation'|translate(\"<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/tracking-goals-web-analytics/' target='_blank'>\",\"</a>\")|raw }}</p>
    {% endset %}

    {% include \"@Goals/_addEditGoal.twig\" %}

    <br/><br/>

{% else %}
    <div piwik-content-block content-title=\"{{ 'Goals_AddNewGoal'|translate|e('html_attr') }}\">
        <p>
            {{ 'Goals_NoGoalsNeedAccess'|translate|raw }}
        </p>
        <p>
            {{ 'Goals_LearnMoreAboutGoalTrackingDocumentation'|translate(\"<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/tracking-goals-web-analytics/' target='_blank'>\",\"</a>\")|raw }}
        </p>
    </div>
    {{ postEvent(\"Template.afterGoalCannotAddNewGoal\") }}

{% endif %}
", "@Goals/addNewGoal.twig", "/var/www/html/analytics/plugins/Goals/templates/addNewGoal.twig");
    }
}
