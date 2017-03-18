<?php

/* @Goals/_addEditGoal.twig */
class __TwigTemplate_ce2fab7827060f6dbe4caefa2dfe22d34eb92004d2ecd2d594333fb423c0720d extends Twig_Template
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
        echo "
";
        // line 2
        $context["ajax"] = $this->loadTemplate("ajaxMacros.twig", "@Goals/_addEditGoal.twig", 2);
        // line 3
        echo $context["ajax"]->geterrorDiv();
        echo "

<script type=\"text/javascript\">
    ";
        // line 6
        if (($context["userCanEditGoals"] ?? $this->getContext($context, "userCanEditGoals"))) {
            // line 7
            echo "        ";
            if ( !array_key_exists("onlyShowAddNewGoal", $context)) {
                // line 8
                echo "            piwik.goals = ";
                echo ($context["goalsJSON"] ?? $this->getContext($context, "goalsJSON"));
                echo ";
        ";
            }
            // line 10
            echo "    ";
        } else {
            // line 11
            echo "        piwik.goals = ";
            echo ($context["goalsJSON"] ?? $this->getContext($context, "goalsJSON"));
            echo ";
    ";
        }
        // line 13
        echo "
</script>

<div piwik-manage-goals
        ";
        // line 17
        if (($context["userCanEditGoals"] ?? $this->getContext($context, "userCanEditGoals"))) {
            // line 18
            echo "            ";
            if ( !array_key_exists("onlyShowAddNewGoal", $context)) {
                // line 19
                echo "                ";
                if (($context["idGoal"] ?? $this->getContext($context, "idGoal"))) {
                    // line 20
                    echo "                    show-goal=\"";
                    echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, ($context["idGoal"] ?? $this->getContext($context, "idGoal")), "js"), "html", null, true);
                    echo "\"
                ";
                }
                // line 22
                echo "            ";
            } else {
                // line 23
                echo "                show-add-goal=\"true\"
            ";
            }
            // line 25
            echo "        ";
        }
        echo ">

    ";
        // line 27
        if ( !array_key_exists("onlyShowAddNewGoal", $context)) {
            // line 28
            echo "        ";
            $this->loadTemplate("@Goals/_listGoalEdit.twig", "@Goals/_addEditGoal.twig", 28)->display($context);
            // line 29
            echo "    ";
        }
        // line 30
        echo "    ";
        if (($context["userCanEditGoals"] ?? $this->getContext($context, "userCanEditGoals"))) {
            // line 31
            echo "        ";
            $this->loadTemplate("@Goals/_formAddGoal.twig", "@Goals/_addEditGoal.twig", 31)->display($context);
            // line 32
            echo "    ";
        }
        // line 33
        echo "    <a id='bottom'></a>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Goals/_addEditGoal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 33,  97 => 32,  94 => 31,  91 => 30,  88 => 29,  85 => 28,  83 => 27,  77 => 25,  73 => 23,  70 => 22,  64 => 20,  61 => 19,  58 => 18,  56 => 17,  50 => 13,  44 => 11,  41 => 10,  35 => 8,  32 => 7,  30 => 6,  24 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% import 'ajaxMacros.twig' as ajax %}
{{ ajax.errorDiv() }}

<script type=\"text/javascript\">
    {% if userCanEditGoals %}
        {% if onlyShowAddNewGoal is not defined %}
            piwik.goals = {{ goalsJSON|raw }};
        {% endif %}
    {% else %}
        piwik.goals = {{ goalsJSON|raw }};
    {% endif %}

</script>

<div piwik-manage-goals
        {% if userCanEditGoals %}
            {% if onlyShowAddNewGoal is not defined %}
                {% if idGoal %}
                    show-goal=\"{{ idGoal|e('js') }}\"
                {% endif %}
            {% else %}
                show-add-goal=\"true\"
            {% endif %}
        {% endif %}>

    {% if onlyShowAddNewGoal is not defined %}
        {% include \"@Goals/_listGoalEdit.twig\" %}
    {% endif %}
    {% if userCanEditGoals %}
        {% include \"@Goals/_formAddGoal.twig\" %}
    {% endif %}
    <a id='bottom'></a>
</div>
", "@Goals/_addEditGoal.twig", "/var/www/html/analytics/plugins/Goals/templates/_addEditGoal.twig");
    }
}
