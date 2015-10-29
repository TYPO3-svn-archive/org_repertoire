plugin.tx_browser_pi1 {
  views {
    list {
      331 {
        select (
          tx_org_repertoire.title,
          tx_org_repertoire.crdate,
          tx_org_repertoire.uid,
          tx_org_repertoire.bodytext,

          tx_org_repertoire.image,
          tx_org_repertoire.imageseo,

          tx_org_repertoire.producer,
          tx_org_repertoire.subtitle,
          tx_org_repertoire.marginal_subtitle,
          tx_org_repertoire.marginal_title,
          tx_org_repertoire.marginal_short,
          tx_org_repertoire.teaser_subtitle,
          tx_org_repertoire.teaser_title,
          tx_org_repertoire.teaser_short
        )
        orderBy (
          tx_org_repertoire.title
        )
        // Workaround: Without it i.e. the filename in tx_org_eventcat.title would get a typolink!
        csvLinkToSingleView = dummy
      }
    }
  }
}