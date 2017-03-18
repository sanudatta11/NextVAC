<?php

/* @Marketplace/getPremiumFeatures.twig */
class __TwigTemplate_42cb92793ab1adcc187d9025e8bd922fb8a016336a7751da3981ceea623ec318 extends Twig_Template
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
        echo "<div class=\"getNewPlugins getPremiumFeatures widgetBody\">
    <div class=\"row\">
        ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plugins"] ?? $this->getContext($context, "plugins")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["plugin"]) {
            // line 4
            echo "            <div class=\"col s12 m4\">

                <h3 class=\"pluginName\" piwik-plugin-name=\"";
            // line 6
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["plugin"], "name", array()), "html_attr");
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["plugin"], "displayName", array()), "html", null, true);
            echo "</h3>
                <span class=\"pluginBody\">
                    ";
            // line 8
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["plugin"], "description", array()), "html", null, true);
            echo "
                    <br />
                    <a href=\"javascript:;\" class=\"pluginMoreDetails\" piwik-plugin-name=\"";
            // line 10
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["plugin"], "name", array()), "html_attr");
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_MoreDetails")), "html", null, true);
            echo "</a>
                </span>
            </div>
            ";
            // line 13
            if ((($this->getAttribute($context["loop"], "index", array()) % 3) == 0)) {
                // line 14
                echo "                </div><div class=\"row\">
            ";
            }
            // line 16
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['plugin'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "    </div>

    <div class=\"widgetBody\">
        <a href=\"";
        // line 20
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "Marketplace", "action" => "overview", "show" => "premium"))), "html", null, true);
        echo "\"
            >";
        // line 21
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CorePluginsAdmin_ViewAllMarketplacePlugins")), "html", null, true);
        echo "</a>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "@Marketplace/getPremiumFeatures.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 21,  89 => 20,  84 => 17,  70 => 16,  66 => 14,  64 => 13,  56 => 10,  51 => 8,  44 => 6,  40 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"getNewPlugins getPremiumFeatures widgetBody\">
    <div class=\"row\">
        {% for plugin in plugins %}
            <div class=\"col s12 m4\">

                <h3 class=\"pluginName\" piwik-plugin-name=\"{{ plugin.name|e('html_attr') }}\">{{ plugin.displayName }}</h3>
                <span class=\"pluginBody\">
                    {{ plugin.description }}
                    <br />
                    <a href=\"javascript:;\" class=\"pluginMoreDetails\" piwik-plugin-name=\"{{ plugin.name|e('html_attr') }}\">{{ 'General_MoreDetails'|translate }}</a>
                </span>
            </div>
            {% if loop.index % 3 == 0 %}
                </div><div class=\"row\">
            {% endif %}
        {% endfor %}
    </div>

    <div class=\"widgetBody\">
        <a href=\"{{ linkTo({'module': 'Marketplace', 'action': 'overview', 'show': 'premium'}) }}\"
            >{{ 'CorePluginsAdmin_ViewAllMarketplacePlugins'|translate }}</a>
    </div>
</div>", "@Marketplace/getPremiumFeatures.twig", "/var/www/html/analytics/plugins/Marketplace/templates/getPremiumFeatures.twig");
    }
}
