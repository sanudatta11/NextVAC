<?php

/* @UserCountry/getDistinctCountries.twig */
class __TwigTemplate_766b8b5334513471259e8efb115021a582adad4483bb6f552910a5abbe898f5d extends Twig_Template
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
        echo "<div piwik-content-block>
    <div class=\"sparkline\">
        ";
        // line 3
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array(($context["urlSparklineCountries"] ?? $this->getContext($context, "urlSparklineCountries"))));
        echo "
        ";
        // line 4
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_DistinctCountries", (("<strong>" . call_user_func_array($this->env->getFilter('number')->getCallable(), array(($context["numberDistinctCountries"] ?? $this->getContext($context, "numberDistinctCountries"))))) . "</strong>")));
        echo "
    </div>
    <br style=\"clear:left\"/>
</div>";
    }

    public function getTemplateName()
    {
        return "@UserCountry/getDistinctCountries.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div piwik-content-block>
    <div class=\"sparkline\">
        {{ sparkline(urlSparklineCountries) }}
        {{ 'UserCountry_DistinctCountries'|translate(\"<strong>\"~numberDistinctCountries|number~\"</strong>\")|raw }}
    </div>
    <br style=\"clear:left\"/>
</div>", "@UserCountry/getDistinctCountries.twig", "/var/www/html/analytics/plugins/UserCountry/templates/getDistinctCountries.twig");
    }
}
