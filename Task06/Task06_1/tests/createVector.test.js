import createVector from '../src/index'

test('toString', () => {
  expect(createVector(-94, 5, 35).toString()).toBe('(-94;5;35)')
})

test('getLength', () => {
  expect(createVector(4, 7, 4).getLength()).toBe(9)
})

test('add', () => {
  const vector1 = createVector(20, 50, 15)
  const vector2 = createVector(10, 4, 15)
  expect(vector1.add(vector2).toString()).toBe('(30;54;30)')
})

test('sub', () => {
  const vector1 = createVector(20, 50, 15)
  const vector2 = createVector(10, 4, 15)
  expect(vector1.sub(vector2).toString()).toBe('(10;46;0)')
})

test('product', () => {
  expect(createVector(-4, 5, 6).product(2).toString()).toBe('(-8;10;12)')
})

test('scalarProduct', () => {
  const vector1 = createVector(4, -5, 2)
  const vector2 = createVector(6, 5, 3)
  expect(vector1.scalarProduct(vector2)).toBe(5)
})

test('vectorProduct', () => {
  const vector1 = createVector(2, -3, 0)
  const vector2 = createVector(5, 3, 7)
  expect(vector1.vectorProduct(vector2).toString()).toBe('(-21;-14;21)')
})
