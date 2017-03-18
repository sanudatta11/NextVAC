<?php

/* @CoreHome/getRowEvolutionPopover.twig */
class __TwigTemplate_327d5144601c7c947dc7b327aed64ba04e5b4ecdcd44a752db18ff3e6ddfea9f extends Twig_Template
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
        $context["seriesColorCount"] = twig_constant("Piwik\\Plugins\\CoreVisualizations\\Visualizations\\JqplotGraph\\Evolution::SERIES_COLOR_COUNT");
        // line 2
        echo "<div class=\"rowevolution\">
    <div class=\"popover-title\">";
        // line 3
        echo ($context["popoverTitle"] ?? $this->getContext($context, "popoverTitle"));
        echo "</div>
    <div class=\"graph\">
        ";
        // line 5
        echo ($context["graph"] ?? $this->getContext($context, "graph"));
        echo "
    </div>
    <div class=\"metrics-container\">
        <h2>";
        // line 8
        echo ($context["availableMetricsText"] ?? $this->getContext($context, "availableMetricsText"));
        echo "</h2>

        <div class=\"alert alert-info\">
            ";
        // line 11
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("RowEvolution_Documentation")), "html", null, true);
        echo "
        </div>
        <table class=\"metrics\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" data-thing=\"";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, ($context["seriesColorCount"] ?? $this->getContext($context, "seriesColorCount")), "html", null, true);
        echo "\">
            ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["metrics"] ?? $this->getContext($context, "metrics")));
        foreach ($context['_seq'] as $context["i"] => $context["metric"]) {
            // line 15
            echo "                <tr data-i=\"";
            echo \Piwik\piwik_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\" ";
            if ((($this->getAttribute($context["metric"], "hide", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["metric"], "hide", array()))) : (""))) {
                echo "style=\"display:none\"";
            }
            echo ">
                    <td class=\"sparkline\">
                        ";
            // line 17
            echo $this->getAttribute($context["metric"], "sparkline", array());
            echo "
                    </td>
                    <td class=\"text\">
                        <span class=\"evolution-graph-colors\" data-name=\"series";
            // line 20
            echo \Piwik\piwik_escape_filter($this->env, (($context["i"] % ($context["seriesColorCount"] ?? $this->getContext($context, "seriesColorCount"))) + 1), "html", null, true);
            echo "\">";
            // line 21
            echo $this->getAttribute($context["metric"], "label", array());
            // line 22
            echo "</span>
                        ";
            // line 23
            if ($this->getAttribute($context["metric"], "details", array())) {
                echo ":
                            <span class=\"details\" title=\"";
                // line 24
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["metric"], "minmax", array()), "html", null, true);
                echo "\">";
                echo $this->getAttribute($context["metric"], "details", array());
                echo "</span>
                        ";
            }
            // line 26
            echo "                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['i'], $context['metric'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "        </table>
    </div>
    <div class=\"compare-container\">
        <h2>";
        // line 32
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("RowEvolution_CompareRows")), "html", null, true);
        echo "</h2>

        <div class=\"alert alert-info\">
            ";
        // line 35
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("RowEvolution_CompareDocumentation"));
        echo "
        </div>
        <a href=\"#\" class=\"rowevolution-startmulti\">» ";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("RowEvolution_PickARow")), "html", null, true);
        echo "</a>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/getRowEvolutionPopover.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 37,  108 => 35,  102 => 32,  97 => 29,  89 => 26,  82 => 24,  78 => 23,  75 => 22,  73 => 21,  70 => 20,  64 => 17,  54 => 15,  50 => 14,  46 => 13,  41 => 11,  35 => 8,  29 => 5,  24 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set seriesColorCount = constant(\"Piwik\\\\Plugins\\\\CoreVisualizations\\\\Visualizations\\\\JqplotGraph\\\\Evolution::SERIES_COLOR_COUNT\") %}
<div class=\"rowevolution\">
    <div class=\"popover-title\">{{ popoverTitle | raw }}</div>
    <div class=\"graph\">
        {{ graph|raw }}
    </div>
    <div class=\"metrics-container\">
        <h2>{{ availableMetricsText|raw }}</h2>

        <div class=\"alert alert-info\">
            {{ 'RowEvolution_Documentation'|translate }}
        </div>
        <table class=\"metrics\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" data-thing=\"{{ seriesColorCount }}\">
            {% for i, metric in metrics %}
                <tr data-i=\"{{ i }}\" {% if metric.hide|default %}style=\"display:none\"{% endif %}>
                    <td class=\"sparkline\">
                        {{ metric.sparkline|raw }}
                    </td>
                    <td class=\"text\">
                        <span class=\"evolution-graph-colors\" data-name=\"series{{ (i % seriesColorCount) + 1 }}\">
                            {{- metric.label|raw -}}
                        </span>
                        {% if metric.details %}:
                            <span class=\"details\" title=\"{{ metric.minmax }}\">{{ metric.details|raw }}</span>
                        {% endif %}
                    </td>
                </tr>
            {% endfor %}
        </table>
    </div>
    <div class=\"compare-container\">
        <h2>{{ 'RowEvolution_CompareRows'|translate }}</h2>

        <div class=\"alert alert-info\">
            {{ 'RowEvolution_CompareDocumentation'|translate|raw }}
        </div>
        <a href=\"#\" class=\"rowevolution-startmulti\">» {{ 'RowEvolution_PickARow'|translate }}</a>
    </div>
</div>
", "@CoreHome/getRowEvolutionPopover.twig", "/var/www/html/analytics/plugins/CoreHome/templates/getRowEvolutionPopover.twig");
    }
}
