plugin.tx_browser_pi1 {
  views {
    single {
      331 {
        tx_org_repertoire {
          title {
            40 {
              20 {
                20 {
                  renderObj {
                    default {
                      30 >
                        // location items
                      30 = COA
                      30 {
                        10 = CONTENT
                        10 {
                          table = tx_org_location
                          select {
                            pidInList = {$plugin.org.sysfolder.location}
                            join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_location.uid
                            where {
                              field = uid
                              noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_cal' AND tx_org_mm_all.table_foreign = 'tx_org_location'|
                            }
                            //max = 1
                          }
                            // city, location
                          renderObj = COA
                          renderObj {
                              // city
                            10 = TEXT
                            10 {
                              //field = uid
                              field       = mail_city // mail_postcode
                              noTrimWrap  = |, ||
                              required    = 1
                            }
                              // location
                            20 = TEXT
                            20 {
                              field       = title
                              noTrimWrap  = | (|)|
                              required    = 1
                            }
                          }
                        }
                        if {
                          isTrue = {$plugin.org-repertoire.templates.repertoire.plusLocation}
                        }
                      }
                    }
                    notype {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                    page {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                    url {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                  }
                }
                10 {
                  renderObj {
                    default {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                    notype {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                      // link to internal page
                    page {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                    url {
                      30 >
                      30 < plugin.tx_browser_pi1.views.single.331.tx_org_repertoire.title.40.20.20.renderObj.default.30
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}