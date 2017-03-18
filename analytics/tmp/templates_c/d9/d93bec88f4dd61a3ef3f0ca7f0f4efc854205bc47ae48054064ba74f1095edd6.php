<?php

/* @SitesManager/siteWithoutData.twig */
class __TwigTemplate_7c987f4da1b4e59f0b766d7a5e64295600e2a2f59b5aca78fc1c7ed1512cac4e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("dashboard.twig", "@SitesManager/siteWithoutData.twig", 1);
        $this->blocks = array(
            'notification' => array($this, 'block_notification'),
            'topcontrols' => array($this, 'block_topcontrols'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "dashboard.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_notification($context, array $blocks = array())
    {
    }

    // line 5
    public function block_topcontrols($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->loadTemplate("@CoreHome/_siteSelectHeader.twig", "@SitesManager/siteWithoutData.twig", 6)->display($context);
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "
    <script type=\"text/javascript\" charset=\"utf-8\">
        \$(document).ready(function () {
            \$('<div />').insertAfter('.site-without-data').liveWidget({
                interval: 1000,
                onUpdate: function () {
                    // reload page as soon as a visit was detected
                    broadcast.propagateNewPage('date=today');
                },
                dataUrlParams: {
                    module: 'Live',
                    action: 'getLastVisitsStart'
                }
            });
        });
    </script>

    <div class=\"site-without-data\">

        <h2>";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_SiteWithoutDataTitle")), "html", null, true);
        echo "</h2>

        <p>
            ";
        // line 32
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_SiteWithoutDataDescription")), "html", null, true);
        echo "
            ";
        // line 33
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_SiteWithoutDataSetupTracking", (("<a href=\"" . call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "CoreAdminHome", "action" => "trackingCodeGenerator")))) . "\">"), "</a>"));
        // line 36
        echo "
        </p>

        <p>
            ";
        // line 40
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_SiteWithoutDataMessageDisappears")), "html", null, true);
        echo "
            ";
        // line 41
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_SiteWithoutDataSetupGoals", (("<a href=\"" . call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "Goals", "action" => "manage")))) . "\">"), "</a>"));
        // line 44
        echo "
        </p>

        ";
        // line 47
        echo ($context["trackingHelp"] ?? $this->getContext($context, "trackingHelp"));
        echo "

    </div>

";
    }

    public function getTemplateName()
    {
        return "@SitesManager/siteWithoutData.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 47,  91 => 44,  89 => 41,  85 => 40,  79 => 36,  77 => 33,  73 => 32,  67 => 29,  46 => 10,  43 => 9,  38 => 6,  35 => 5,  30 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"dashboard.twig\" %}

{% block notification %}{% endblock %}

{% block topcontrols %}
    {% include \"@CoreHome/_siteSelectHeader.twig\" %}
{% endblock %}

{% block content %}

    <script type=\"text/javascript\" charset=\"utf-8\">
        \$(document).ready(function () {
            \$('<div />').insertAfter('.site-without-data').liveWidget({
                interval: 1000,
                onUpdate: function () {
                    // reload page as soon as a visit was detected
                    broadcast.propagateNewPage('date=today');
                },
                dataUrlParams: {
                    module: 'Live',
                    action: 'getLastVisitsStart'
                }
            });
        });
    </script>

    <div class=\"site-without-data\">

        <h2>{{ 'SitesManager_SiteWithoutDataTitle'|translate }}</h2>

        <p>
            {{ 'SitesManager_SiteWithoutDataDescription'|translate }}
            {{ 'SitesManager_SiteWithoutDataSetupTracking'|translate('<a href=\"' ~ linkTo({
                'module': 'CoreAdminHome',
                'action': 'trackingCodeGenerator',
            }) ~ '\">', \"</a>\")|raw }}
        </p>

        <p>
            {{ 'SitesManager_SiteWithoutDataMessageDisappears'|translate }}
            {{ 'SitesManager_SiteWithoutDataSetupGoals'|translate('<a href=\"' ~ linkTo({
                'module': 'Goals',
                'action': 'manage',
            }) ~ '\">', \"</a>\")|raw }}
        </p>

        {{ trackingHelp|raw }}

    </div>

{% endblock %}
", "@SitesManager/siteWithoutData.twig", "/var/www/html/analytics/plugins/SitesManager/templates/siteWithoutData.twig");
    }
}
