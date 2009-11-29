def xor(s1, s2):
    if len(s1) != len(s2):
        raise ValueError('Can only xor strings of the same length, got ones of length ' + str(len(s1)) + ' and ' + str(len(s2)))
    return ''.join([chr(ord(a) ^ ord(b)) for a, b in zip(s1, s2)])

def test_xor():
    assert xor(xor('abc', 'qed'), 'qed') == 'abc'
    assert xor('abc', 'qed') == xor('qed', 'abc')
    assert xor('a' * 500, 'a' * 500) == chr(0) * 500
    assert xor(chr(255) * 500, chr(255) * 500) == chr(0) * 500
