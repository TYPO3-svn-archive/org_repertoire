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
                  // producer
                22 = COA
                22 {
                  10 = TEXT
                  10 {
                    value = By
                    lang {
                      de = Von
                      en = By
                    }
                    noTrimWrap = || |
                  }
                  20 = TEXT
                  20 {
                    field = tx_org_repertoire.producer
                  }
                  if {
                    isTrue {
                      field = tx_org_repertoire.producer
                    }
                  }
                  stdWrap {
                    parseFunc < lib.parseFunc_RTE
                  }
                }
                  // staff
                23 = TEXT
                23 {
                  field = tx_org_repertoire.staff
                  required = 1
                  stdWrap {
                    parseFunc < lib.parseFunc_RTE
                  }
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
                22 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.22
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
                23 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.23
              }
              2 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                22 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.22
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
                23 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.23
              }
              8 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                22 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.22
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
                23 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.23
              }
              9 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                22 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.22
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
                23 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.23
              }
              10 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                22 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.22
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
                23 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.23
              }
              17 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                22 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.22
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
                23 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.23
              }
              18 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                22 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.22
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
                23 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.23
              }
              25 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                22 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.22
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
                23 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.23
              }
              26 {
                21 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.21
                22 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.22
                31 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.31
                23 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.20.0.23
              }
            }
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}