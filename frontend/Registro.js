import { StyleSheet, Text, View, TextInput, Button, Alert, ImageBackground} from 'react-native';
import React, { useState } from 'react';
import axios from 'axios';
import { useNavigation } from '@react-navigation/native';
// import AsyncStorage from '@react-native-async-storage/async-storage';

const image = { uri: 'https://i.pinimg.com/564x/cf/e4/9e/cfe49e5d75dfdd785be366c29c338a85.jpg' };

export default function Registro() {
    const [name, setName] = useState('');
    const [phone, setPhone] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const navigation = useNavigation();

    const handleRegistro = () => {
        axios.post('http://192.168.20.20:8000/api/registro', {
            name: name,
            phone: phone,
            email: email,
            password: password,
        }).then((response) => {
            navigation.navigate('Login');
            setName('');
            setPhone('');
            setEmail('');
            setPassword('');
        })
            .catch((error) => {
                navigation.navigate('Registro');
                setName('');
                setPhone('');
                setEmail('');
                setPassword('');
            });
    };
    return (
        <View style={styles.container}>
            <ImageBackground source={image} resizeMode="cover" style={styles.image}>
                <Text style={{ fontSize: 30, marginBottom: 40,color: 'white'  }}>REGISTRO CLIENTE</Text>
                <TextInput style={styles.inputs} placeholder='Nombre' onChangeText={(text) => setName(text)} value={name} ></TextInput>
                <TextInput style={styles.inputs} placeholder='Celular' onChangeText={(text) => setPhone(text)} value={phone}></TextInput>
                <TextInput style={styles.inputs} placeholder='Correo' onChangeText={(text) => setEmail(text)} value={email}></TextInput>
                <TextInput style={styles.inputs} placeholder='Password' secureTextEntry={true} onChangeText={(text) => setPassword(text)} value={password}></TextInput>
                <Button title="Registrar" onPress={handleRegistro} color="#FF1700" />
            </ImageBackground>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
    },
    image: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
      },
    inputs: {
        backgroundColor: '#F7E9AB',
        textAlign: 'center',
        borderWidth: 1,
        borderColor: '#000',
        width: 200,
        height: 40,
        padding: 10,
        margin: 10,
        borderRadius: 10,
    }
});