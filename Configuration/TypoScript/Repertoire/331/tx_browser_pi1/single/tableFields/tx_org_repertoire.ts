plugin.tx_browser_pi1 {
  views {
    single {
      331 {
          // 140706: empty statement: for proper comments only
        tx_org_repertoire {
        }
          // title: image, header, bodytext
        tx_org_repertoire =
        tx_org_repertoire {
          title < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.imageText.0
          title {
            20 {
              0 {
                  // subtitle
                21 = TEXT
                21 {
                  field = tx_org_repertoire.subtitle // tx_org_repertoire.teaser_subtitle
                  wrap = <h2>|</h2>
                  required = 1
                }
                  // length
                31 = COA
                31 {
                  10 = TEXT
                  10 {
                    value = Length
                    lang {
                      de = Dauer
                      en = Length
                    }
                    noTrimWrap = ||: |
                  }
                  20 = TEXT
                  20 {
                    field = tx_org_repertoire.length
                  }
                  if {
                    isTrue {
                      field = tx_org_repertoire.length
                    }
                  }
                  stdWrap {
                    parseFunc < lib.parseFunc_RTE
                  }
                }
              }
              1 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
              }
              2 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
              }
              8 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
              }
              9 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
              }
              10 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
              }
              17 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
              }
              18 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
              }
              25 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
              }
              26 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
              }
            }
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}