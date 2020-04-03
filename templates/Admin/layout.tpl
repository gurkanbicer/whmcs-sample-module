<div class="row">
    <div class="col-lg-12">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{$modulelink}&action=index">v{$version}</a>
                </div>
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="nav navbar-nav">
                        <li{if $action == "index"} class="active"{/if}>
                            <a href="{$modulelink}&action=index">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <div class="navbar-form navbar-right"></div>
                </div>
            </div>
        </nav>
    </div>
</div>
{block name="body"}{/block}