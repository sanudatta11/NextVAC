<?php

/* @CoreAdminHome/home.twig */
class __TwigTemplate_7c4f315b1df77c1afdcd0309b3e12c8471ad199fac4a0c8031ddc0ce6f73301f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@CoreAdminHome/home.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_MenuGeneralSettings")), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        ob_start();
        // line 7
        echo "        <div piwik-content-block content-title=\"Need help?\">
            <div>
                There are different ways you can get help. There is free support via the Piwik Community and paid support
                provided by the Piwik team and partners of Piwik. Or maybe do you have a bug to report or want to suggest a new
                feature?
                <br />
                <br />
                <a href=\"";
        // line 14
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "Feedback", "action" => "index"))), "html", null, true);
        echo "\">Learn more</a>
            </div>
        </div>
    ";
        $context["feedbackHelp"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 18
        echo "
    ";
        // line 19
        if (($context["isSuperUser"] ?? $this->getContext($context, "isSuperUser"))) {
            // line 20
            echo "        <div class=\"row\">
            <div class=\"col s12 ";
            // line 21
            if (($context["isFeedbackEnabled"] ?? $this->getContext($context, "isFeedbackEnabled"))) {
                echo "m4";
            } else {
                echo "m6";
            }
            echo "\">
                <div piwik-widget-loader='{\"module\":\"CoreHome\",\"action\":\"getSystemSummary\"}'></div>
            </div>
            ";
            // line 24
            if (($context["hasDiagnostics"] ?? $this->getContext($context, "hasDiagnostics"))) {
                // line 25
                echo "                <div class=\"col s12 ";
                if (($context["isFeedbackEnabled"] ?? $this->getContext($context, "isFeedbackEnabled"))) {
                    echo "m4";
                } else {
                    echo "m6";
                }
                echo "\">
                    <div piwik-widget-loader='{\"module\":\"Installation\",\"action\":\"getSystemCheck\"}'></div>
                </div>
            ";
            }
            // line 29
            echo "            ";
            if (($context["isFeedbackEnabled"] ?? $this->getContext($context, "isFeedbackEnabled"))) {
                // line 30
                echo "                <div class=\"col s12 m4\">
                    ";
                // line 31
                echo ($context["feedbackHelp"] ?? $this->getContext($context, "feedbackHelp"));
                echo "
                </div>
            ";
            }
            // line 34
            echo "        </div>
    ";
        } elseif (        // line 35
($context["isFeedbackEnabled"] ?? $this->getContext($context, "isFeedbackEnabled"))) {
            // line 36
            echo "        ";
            echo ($context["feedbackHelp"] ?? $this->getContext($context, "feedbackHelp"));
            echo "
    ";
        }
        // line 38
        echo "
    ";
        // line 39
        if ((($context["hasPremiumFeatures"] ?? $this->getContext($context, "hasPremiumFeatures")) && ($context["isMarketplaceEnabled"] ?? $this->getContext($context, "isMarketplaceEnabled")))) {
            // line 40
            echo "        <div piwik-widget-loader='{\"module\":\"Marketplace\",\"action\":\"getPremiumFeatures\"}'></div>
    ";
        }
        // line 42
        echo "    ";
        if ((($context["hasNewPlugins"] ?? $this->getContext($context, "hasNewPlugins")) && ($context["isMarketplaceEnabled"] ?? $this->getContext($context, "isMarketplaceEnabled")))) {
            // line 43
            echo "        <div piwik-widget-loader='{\"module\":\"Marketplace\",\"action\":\"getNewPlugins\", \"isAdminPage\": \"1\"}'></div>
    ";
        }
        // line 45
        echo "
    ";
        // line 46
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.adminHome"));
        echo "

    <style type=\"text/css\">
        #content .piwik-donate-call {
            padding: 0;
            border: 0;
            max-width: none;
        }
        .theWidgetContent .rss {
            margin: -10px -15px;
        }
    </style>

    ";
        // line 59
        if ((($context["hasDonateForm"] ?? $this->getContext($context, "hasDonateForm")) || ($context["hasPiwikBlog"] ?? $this->getContext($context, "hasPiwikBlog")))) {
            // line 60
            echo "        <div class=\"row\">
            ";
            // line 61
            if (($context["hasDonateForm"] ?? $this->getContext($context, "hasDonateForm"))) {
                // line 62
                echo "                <div class=\"col s12 ";
                if (($context["hasPiwikBlog"] ?? $this->getContext($context, "hasPiwikBlog"))) {
                    echo "m6";
                }
                echo "\">
                    <div piwik-widget-loader='{\"module\":\"CoreHome\",\"action\":\"getDonateForm\",\"widget\": \"0\"}'></div>
                </div>
            ";
            }
            // line 66
            echo "            ";
            if (($context["hasPiwikBlog"] ?? $this->getContext($context, "hasPiwikBlog"))) {
                // line 67
                echo "                <div class=\"col s12 ";
                if (($context["hasDonateForm"] ?? $this->getContext($context, "hasDonateForm"))) {
                    echo "m6";
                }
                echo "\">
                    <div piwik-widget-loader='{\"module\":\"RssWidget\",\"action\":\"rssPiwik\"}'></div>
                </div>
            ";
            }
            // line 71
            echo "        </div>
    ";
        }
        // line 73
        echo "
";
    }

    public function getTemplateName()
    {
        return "@CoreAdminHome/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 73,  175 => 71,  165 => 67,  162 => 66,  152 => 62,  150 => 61,  147 => 60,  145 => 59,  129 => 46,  126 => 45,  122 => 43,  119 => 42,  115 => 40,  113 => 39,  110 => 38,  104 => 36,  102 => 35,  99 => 34,  93 => 31,  90 => 30,  87 => 29,  75 => 25,  73 => 24,  63 => 21,  60 => 20,  58 => 19,  55 => 18,  48 => 14,  39 => 7,  36 => 6,  33 => 5,  29 => 1,  25 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'admin.twig' %}

{% set title %}{{ 'CoreAdminHome_MenuGeneralSettings'|translate }}{% endset %}

{% block content %}
    {% set feedbackHelp %}
        <div piwik-content-block content-title=\"Need help?\">
            <div>
                There are different ways you can get help. There is free support via the Piwik Community and paid support
                provided by the Piwik team and partners of Piwik. Or maybe do you have a bug to report or want to suggest a new
                feature?
                <br />
                <br />
                <a href=\"{{ linkTo({'module': 'Feedback', 'action': 'index'}) }}\">Learn more</a>
            </div>
        </div>
    {% endset %}

    {% if isSuperUser %}
        <div class=\"row\">
            <div class=\"col s12 {% if isFeedbackEnabled %}m4{% else %}m6{% endif %}\">
                <div piwik-widget-loader='{\"module\":\"CoreHome\",\"action\":\"getSystemSummary\"}'></div>
            </div>
            {% if hasDiagnostics %}
                <div class=\"col s12 {% if isFeedbackEnabled %}m4{% else %}m6{% endif %}\">
                    <div piwik-widget-loader='{\"module\":\"Installation\",\"action\":\"getSystemCheck\"}'></div>
                </div>
            {% endif %}
            {% if isFeedbackEnabled %}
                <div class=\"col s12 m4\">
                    {{ feedbackHelp|raw }}
                </div>
            {% endif %}
        </div>
    {% elseif isFeedbackEnabled %}
        {{ feedbackHelp|raw }}
    {% endif %}

    {% if hasPremiumFeatures and isMarketplaceEnabled %}
        <div piwik-widget-loader='{\"module\":\"Marketplace\",\"action\":\"getPremiumFeatures\"}'></div>
    {% endif %}
    {% if hasNewPlugins and isMarketplaceEnabled %}
        <div piwik-widget-loader='{\"module\":\"Marketplace\",\"action\":\"getNewPlugins\", \"isAdminPage\": \"1\"}'></div>
    {% endif %}

    {{ postEvent('Template.adminHome') }}

    <style type=\"text/css\">
        #content .piwik-donate-call {
            padding: 0;
            border: 0;
            max-width: none;
        }
        .theWidgetContent .rss {
            margin: -10px -15px;
        }
    </style>

    {% if hasDonateForm or hasPiwikBlog %}
        <div class=\"row\">
            {% if hasDonateForm %}
                <div class=\"col s12 {% if hasPiwikBlog %}m6{% endif %}\">
                    <div piwik-widget-loader='{\"module\":\"CoreHome\",\"action\":\"getDonateForm\",\"widget\": \"0\"}'></div>
                </div>
            {% endif %}
            {% if hasPiwikBlog %}
                <div class=\"col s12 {% if hasDonateForm %}m6{% endif %}\">
                    <div piwik-widget-loader='{\"module\":\"RssWidget\",\"action\":\"rssPiwik\"}'></div>
                </div>
            {% endif %}
        </div>
    {% endif %}

{% endblock %}
", "@CoreAdminHome/home.twig", "/var/www/html/analytics/plugins/CoreAdminHome/templates/home.twig");
    }
}
