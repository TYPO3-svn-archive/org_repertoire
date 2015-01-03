plugin.tx_browser_pi1 {
  views {
    list {
      331 {
        select (
          tx_org_repertoire.title,
          tx_org_repertoire.bodytext,
          tx_org_repertoire.image,
          tx_org_repertoire.imageseo,
          tx_org_repertoire.page,
          tx_org_repertoire.producer,
          tx_org_repertoire.subtitle,
          tx_org_repertoire.teaser_short,
          tx_org_repertoire.type,
          tx_org_repertoire.uid,
          tx_org_repertoire.url,
          tx_org_cal.datetime,
          tx_org_cal.type
        )
        orderBy (
          tx_org_repertoire.title
        )
        andWhere = tx_org_cal.datetime > UNIX_TIMESTAMP() AND tx_org_cal.type LIKE 'tx_org_repertoire'
        csvLinkToSingleView = tx_org_repertoire.title
        // Workaround: Without it i.e. the filename in tx_org_eventcat.title would get a typolink!
        csvLinkToSingleView = dummy
      }
    }
  }
}