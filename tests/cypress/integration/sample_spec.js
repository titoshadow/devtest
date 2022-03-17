describe('My First Test', () => {
    it('Visits the home page', () => {
        cy.visit('http://127.0.0.1:8000')

        cy.contains('table')
    })
})
