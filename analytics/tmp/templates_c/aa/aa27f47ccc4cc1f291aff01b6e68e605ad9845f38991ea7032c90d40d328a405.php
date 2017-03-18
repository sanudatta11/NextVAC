<?php

/* @CoreHome/widgetContainer.twig */
class __TwigTemplate_ecf3ec93899a3d9c38da1b8307df70bc66ba5b8370c6b4e4bc216654c28c988a extends Twig_Template
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
        echo "<div>
    <div piwik-widget
         containerid=\"";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, ($context["containerId"] ?? $this->getContext($context, "containerId")), "html_attr");
        echo "\"
         widgetized=\"";
        // line 4
        if (($context["isWidgetized"] ?? $this->getContext($context, "isWidgetized"))) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\"></div>

    <script type=\"text/javascript\">
        \$(function () {

            var piwikWidget = \$('[piwik-widget][containerid=";
        // line 9
        echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, ($context["containerId"] ?? $this->getContext($context, "containerId")), "js"), "html", null, true);
        echo "]');
            var isExportedAsWidget = \$('body > .widget').size();

            if (!isExportedAsWidget) {
                angular.element(document).injector().invoke(function(\$compile) {
                    var scope = angular.element(piwikWidget).scope();
                    \$compile(piwikWidget)(scope.\$new());
                });
            }

        });
    </script>
</div>";
    }

    public function getTemplateName()
    {
        return "@CoreHome/widgetContainer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 9,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div>
    <div piwik-widget
         containerid=\"{{ containerId|e('html_attr') }}\"
         widgetized=\"{% if isWidgetized %}true{% else %}false{% endif %}\"></div>

    <script type=\"text/javascript\">
        \$(function () {

            var piwikWidget = \$('[piwik-widget][containerid={{ containerId|e('js') }}]');
            var isExportedAsWidget = \$('body > .widget').size();

            if (!isExportedAsWidget) {
                angular.element(document).injector().invoke(function(\$compile) {
                    var scope = angular.element(piwikWidget).scope();
                    \$compile(piwikWidget)(scope.\$new());
                });
            }

        });
    </script>
</div>", "@CoreHome/widgetContainer.twig", "/var/www/html/analytics/plugins/CoreHome/templates/widgetContainer.twig");
    }
}
