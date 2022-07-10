<style type="text/css">
#tree {
    width: 100%;
    height: 100%;
}

/*partial*/
[lcn='hr-team']>rect {
    fill: #FFCA28;
}

[lcn='sales-team']>rect {
    fill: #F57C00;
}

[lcn='top-management']>rect {
    fill: #f2f2f2;
}

[lcn='top-management']>text,
.assistant>text {
    fill: #aeaeae;
}

[lcn='top-management'] circle,
[lcn='assistant'] {
    fill: #aeaeae;
}

.assistant>rect {
    fill: #ffffff;
}

.assistant [data-ctrl-n-menu-id]>circle {
    fill: #aeaeae;
}

.it-team>rect {
    fill: #b4ffff;
}

.it-team>text {
    fill: #039BE5;
}

.it-team>[data-ctrl-n-menu-id] line {
    stroke: #039BE5;
}

.it-team>g>.ripple {
    fill: #00efef;
}

.hr-team>rect {
    fill: #fff5d8;
}

.hr-team>text {
    fill: #ecaf00;
}

.hr-team>[data-ctrl-n-menu-id] line {
    stroke: #ecaf00;
}

.hr-team>g>.ripple {
    fill: #ecaf00;
}

.sales-team>rect {
    fill: #ffeedd;
}

.sales-team>text {
    fill: #F57C00;
}

.sales-team>[data-ctrl-n-menu-id] line {
    stroke: #F57C00;
}

.sales-team>g>.ripple {
    fill: #F57C00;
}
hr {
    margin: 0px;
    margin-top: 6px;
    margin-bottom: 8px;
}
#tree > svg {
    background-color: #f1f1f1;
}
g[data-n-id="it-team"] > image {
    display: none;
}
div[class="boc-edit-form-instruments"] {
    display: none;
}
div[class="boc-edit-form-header"] {
    height:244px;
}
div[class="boc-edit-form-avatar"] > svg {
    padding-bottom: 14px;
    padding-right: 6px;
}/*
svg text {
    background: red;
    border-radius: 5px;
    border: 2px solid blue;
    padding: 5px;
} */
</style>
<div class="container" style="padding-right: 0px; padding-left: 0px; z-index: 0; position: relative; min-height: 80vh;">
    <div class="row" style="margin-right: 0px; margin-left: 0px;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
            <div style=" width: 100%; height: 100%; background-color: #f1f1f1; padding: 0.01em 16px; border-radius: 0px; margin-left: auto; margin-right: auto; padding-top: 15px; padding-bottom: 15px; box-shadow: 0 4px 14.48px rgb(0 0 0 / 25%);">
                <div class="header_article" style="background-color: #3b3c8c; width: 100%; padding: 8px 16px; border-radius: 0px;">
                    <h3 style='color: white; margin-bottom: 2px; text-align: center;'>Organisasi YKKBI</h3>
                </div>
                <div class="row" style="height: 100%;">
                    <div id="tree" style="height: 100%; background-color: #f1f1f1;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/orgchart.js" async></script>