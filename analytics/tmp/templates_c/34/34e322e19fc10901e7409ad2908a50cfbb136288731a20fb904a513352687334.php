<?php

/* @CoreHome/ReportRenderer/_htmlReportFooter.twig */
class __TwigTemplate_cfa6a303d9635536f80232a2a605d614275526d410f53053c160d288e23282e9 extends Twig_Template
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
        $context["fontStyle"] = "color:#0d0d0d;font-family:-apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Oxygen-Sans, Cantarell, \"Helvetica Neue\", sans-serif; ";
        // line 2
        $context["styleParagraph"] = "font-size:15px;line-height:24px;margin:0 0 16px;";
        // line 3
        echo "
";
        // line 4
        if ( !($context["hasWhiteLabel"] ?? $this->getContext($context, "hasWhiteLabel"))) {
            // line 5
            echo "  <hr style=\" border: 0; margin-top: 50px;  height: 1px; background-image: linear-gradient(to right, rgba(231, 231, 231, 0), rgba(231, 231, 231, 1), rgba(2311, 2311, 231, 0));\">

  <p style='";
            // line 7
            echo \Piwik\piwik_escape_filter($this->env, ($context["styleParagraph"] ?? $this->getContext($context, "styleParagraph")), "html", null, true);
            echo \Piwik\piwik_escape_filter($this->env, ($context["fontStyle"] ?? $this->getContext($context, "fontStyle")), "html", null, true);
            echo "text-align:center;font-size:13px; color:#666; padding:30px'>
    ";
            // line 8
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
            echo "
    <a style=\"color:#439fe0; \" href=\"https://piwik.org/\" title=\"Piwik Analytics\">Piwik Analytics</a>
    <br />
    ";
            // line 11
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_LeadingAnalyticsPlatformRespectsYourPrivacy")), "html", null, true);
            echo "
  </p>
";
        }
        // line 14
        echo "
</div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/ReportRenderer/_htmlReportFooter.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 14,  43 => 11,  37 => 8,  32 => 7,  28 => 5,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set fontStyle = 'color:#0d0d0d;font-family:-apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, Oxygen-Sans, Cantarell, \"Helvetica Neue\", sans-serif; '%}
{% set styleParagraph = 'font-size:15px;line-height:24px;margin:0 0 16px;' %}

{% if not hasWhiteLabel %}
  <hr style=\" border: 0; margin-top: 50px;  height: 1px; background-image: linear-gradient(to right, rgba(231, 231, 231, 0), rgba(231, 231, 231, 1), rgba(2311, 2311, 231, 0));\">

  <p style='{{styleParagraph}}{{fontStyle}}text-align:center;font-size:13px; color:#666; padding:30px'>
    {{'General_PoweredBy'|translate}}
    <a style=\"color:#439fe0; \" href=\"https://piwik.org/\" title=\"Piwik Analytics\">Piwik Analytics</a>
    <br />
    {{ 'CoreHome_LeadingAnalyticsPlatformRespectsYourPrivacy'|translate }}
  </p>
{% endif %}

</div>
</body>
</html>
", "@CoreHome/ReportRenderer/_htmlReportFooter.twig", "/var/www/html/analytics/plugins/CoreHome/templates/ReportRenderer/_htmlReportFooter.twig");
    }
}
