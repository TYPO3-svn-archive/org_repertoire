plugin.tx_browser_pi1 {
  views {
    list {
      331 {
          // title
        tx_org_repertoire =
        tx_org_repertoire {
          title >
            // title
          title = COA
          title {
            wrap = <div class="columns medium-3">|</div>
              // image
            10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0.default
            10 {
              imageLinkWrap {
                typolink {
                  parameter {
                    cObject {
                      30 {
                        value = linktosingle circle
                      }
                    }
                  }
                }
              }
              wrap = <div style="padding-bottom:1em;">|</div>
            }
            20 = COA
            20 {
              stdWrap {
                wrap = <ul class="pricing-table" data-equalizer-watch>|</ul>
              }
                // teaser_title
              10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0.default
              10 {
                typolink.parameter.cObject.30.value = linktosingle button expand
                wrap  = <li class="title">|</li>
              }
                // category
              20 = COA
              20 {
                if =
                if {
                  isTrue {
                    field = tx_org_repertoiretargetgroup.uid
                  }
                }
                  // tx_org_repertoiretargetgroup
                20 = CONTENT
                20 {
                  table = tx_org_repertoiretargetgroup
                  select {
                    pidInList = {$plugin.org.sysfolder.repertoire}
                    //selectFields = tx_org_repertoiretargetgroup.title
                    join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_repertoiretargetgroup.uid
                    where {
                      field = tx_org_repertoire.uid
                      noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_repertoire' AND tx_org_mm_all.table_foreign = 'tx_org_repertoiretargetgroup'|
                    }
                    orderBy = tx_org_repertoiretargetgroup.title
                  }
                    // tx_org_repertoiretargetgroup.title
                  renderObj = TEXT
                  renderObj {
                    field = title
                    //noTrimWrap = |<span class="item">|</span>|
                    wrap = |###POINT###
                  }
                  stdWrap {
                    split {
                      token = ###POINT###
                      cObjNum = 1 |*| 1 |*| 2 || 2
                      1.current = 1
                      1.noTrimWrap = ||, |
                      2.current = 1
                      2.noTrimWrap = |||
                    }
                  }
                }
                wrap = <li class="bullet-item">|</li>
              }
              30 = TEXT
              30 {
                field     = tx_org_repertoire.marginal_subtitle
                required  = 1
                wrap      = <li class="bullet-item">|</li>
              }
                // teaser_short
              40 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0.default
              40 {
                wrap  = <li class="description">|</li>
              }
            }
          }
        }
      }
    }
  }
}