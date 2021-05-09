Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'create-subscription-plan',
      path: '/create-subscription-plan',
      component: require('./components/Tool'),
    },
  ])
})
