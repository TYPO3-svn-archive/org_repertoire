plugin.tx_browser_pi1 {
  views {
    single {
      101 = +Org-Repertoire: Staff
      101 {
        name    = +Org-Repertoire: Staff
        select := addToList(tx_org_staff.tx_org_repertoire)
      }
    }
  }
}