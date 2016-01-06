plugin.tx_browser_pi1 {
  views {
    single {
      331 {
        tx_org_repertoire {
          title {
            50 {
            }
              // tx_org_repertoire.tx_org_staff
            50 = COA
            50 {
                // IF there are records from tx_org_staff AND constant plusStaff is set
              if =
              if {
                value  = 11
                equals {
                  cObject = COA
                  cObject {
                      // records from tx_org_staff
                    10 = CONTENT
                    10 {
                      table = tx_org_staff
                      select {
                        pidInList = {$plugin.org.sysfolder.staff}
                        join = tx_org_mm_all ON tx_org_mm_all.uid_local = tx_org_staff.uid
                        where {
                          field = tx_org_repertoire.uid
                          noTrimWrap = |tx_org_mm_all.uid_foreign = | AND tx_org_mm_all.table_local = 'tx_org_staff' AND tx_org_mm_all.table_foreign = 'tx_org_repertoire'|
                        }
                        max = 1
                      }
                        // tx_org_staff.title croped and linked
                      renderObj = TEXT
                      renderObj {
                        value = 1
                      }
                    }
                      // constant: plusStaff
                    20 = TEXT
                    20 {
                      value = {$plugin.org_repertoire.templates.repertoire.plusStaff}
                    }
                  }
                }
              }
                // header
              10 = TEXT
              10 {
                data = LLL:EXT:org/Resources/Private/Language/tx_org_staff.xml:tx_org_staff
                XXXvalue = People
                XXXlang {
                  de = Personen
                  en = People
                }
                wrap = <li class="header">|</li>
              }
              20 = CONTENT
              20 {
                table = tx_org_staff
                select {
                  pidInList = {$plugin.org.sysfolder.staff}
                  join = tx_org_mm_all ON tx_org_mm_all.uid_local = tx_org_staff.uid
                  where {
                    field = tx_org_repertoire.uid
                    noTrimWrap = |tx_org_mm_all.uid_foreign = | AND tx_org_mm_all.table_local = 'tx_org_staff' AND tx_org_mm_all.table_foreign = 'tx_org_repertoire'|
                  }
                }
                  // tx_org_staff.title croped and linked
                renderObj = CASE
                renderObj {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.1.key}
                  }
                    // link to detail view
                  default = TEXT
                  default {
                    field = title
                    wrap = <li class="url circle">|</li>
                    stdWrap {
                      noTrimWrap = || &raquo;|
                    }
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.default
                  }
                    // no link
                  notype = TEXT
                  notype {
                    field   = title
                    wrap = <li class="url circle">|</li>
                  }
                    // link to internal page
                  page < .default
                  page {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.page
                  }
                    // link to external url
                  url < .page
                  url {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.url
                  }
                }
              }
              wrap = <div class="columns large-4"><ul class="vcard tx_org_repertoire tx_org_staff">|</ul><!-- vcard --></div><!-- /columns -->
            }
          }
        }
      }
    }
  }
}